<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Hirer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HirerController extends Controller
{
    public function index(){
        $employeeID = auth()->id();
        $hirerDetails = DB::table('connection_requests')
            ->where('connection_requests.employee_id', '=', $employeeID)
            ->where('connection_requests.status', '=', 0)
            ->join('users', 'connection_requests.hirer_id', '=', 'users.id')
            ->select('users.*')
            ->get();

        if($hirerDetails->isEmpty()){
            $hirerDetails = array();        
        }
        return view('hirer-signup',array('hirerDetails'=>$hirerDetails));
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


    public function chatView()
    {
        return view('chat.hirerChatInbox');
    }
}