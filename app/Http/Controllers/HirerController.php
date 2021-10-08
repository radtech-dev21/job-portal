<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\{User,Hirer,Employee,Company};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HirerController extends Controller
{
    /*to load company create view*/
    public function index(){
        $id = auth()->id();
        $companyDetails = DB::table('companies')
            ->where('companies.hirer_id', '=', $id)
            ->select('companies.*')
            ->get();
        $data = array();
        if (Auth::user()->role == 'hirer') {
            if (!empty($companyDetails[0])) {
                $data = (array)$companyDetails[0];
            } 
            return view('hirer/create', ['companyDetails' => $data]);

    }

    /*to show hirer dashboard*/
    public function hirerDashboard(){
        return view('hirer/dashboard');
    }

    /*function to save Hirer data*/
    public function saveHirer(Request $request){
        try {
            $validatedData = $request->validate([
                'position' => 'required',
                'experience' => 'required|numeric',
                'location' => 'required|array',
                'skills' => 'required|array'
            ], [
                'position.required' => 'Position is required',
                'experience.required' => 'Experience is required',
                'location.required' => 'Location is required',
                'skills.required' => 'Skill is required'
            ]);
            $hirer = new Hirer;
            $hirer->position   = $validatedData['position'];
            $hirer->experience = $validatedData['experience'];
            $hirer->location   = json_encode($validatedData['location']);
            $hirer->skills     = json_encode($validatedData['skills']);
            $hirer->save();
            User::where('id', Auth::id())->update(['role' => 'hirer']);
            return back()->with('success', 'Hirer created successfully.');
        } catch (Exception $e) {
            dd($e->getMesaage());
        }
    }

    /*to save company details*/
    public function saveCompany(Request $request)
    {
        $companyID = $request->input('company_id');
        $validatedData = $request->validate([
            'name'             => 'required',
            'email'            => 'required',
            'address'          => 'required',
            'contact_no'       => 'required',
            'no_of_employees'  => 'required|numeric',
            'locations'        => 'required|array'
        ]);
        if ($companyID) {
            $company = Company::find($companyID);
        } else {
            $company = new Company;
        }
        $company->name             = $validatedData['name'];
        $company->email            = $validatedData['email'];
        $company->address          = $validatedData['address'];
        $company->contact_no       = $validatedData['contact_no'];
        $company->no_of_employees  = $validatedData['no_of_employees'];
        $company->hirer_id         = auth()->id();
        $company->locations        = json_encode($validatedData['locations']);
        if ($companyID) {
            $company->update();
        } else {
            $company->save();
        }
        if (!$companyID) {
            return back()->with('success', 'Company Created Successfully');
        } else {
            return redirect()->back()->with('success', 'Company Updated Successfully');
        }
    }

    public function chatView()
    {
        $employee = User::where('role', '=', 'employee')->get();

        return view('chat.hirerChatInbox',['employee_data'=>$employee->toArray()]);
    }
}