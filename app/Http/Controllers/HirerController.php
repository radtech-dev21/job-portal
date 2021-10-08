<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\{User,Hirer,Employee,Company};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HirerController extends Controller
{
    public function index(){
        return view('hirer/dashboard');
    }

    /*to create company*/
    public function createCompany()
    {
        return view('hirer/create');
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
            'email'            => 'required|unique:company',
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