<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployeeSkills;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /*to load employee signup view*/
    public function index()
    {
        $id = auth()->id();
        $employeeDetails = DB::table('employees')
            ->where('employees.user_id', '=', $id)
            ->groupBy('employees.id')
            ->join('employee_skills', 'employees.id', '=', 'employee_skills.employee_id')
            ->select('employees.*')
            ->selectRaw('GROUP_CONCAT(employee_skills.skills) as skills')
            ->get();
        $data = array();
        if (Auth::user()->role == 'employee') {
            if (!empty($employeeDetails[0])) {
                $data = (array)$employeeDetails[0];
            } 
            return view('employee/create', ['employeeDetails' => $data]);
        }
        abort(404);
    }

    /*to show employee dashboard*/
    public function employeeDashboard()
    {
        $employeeID = getMyID(auth()->id(),'employee');
        $hirerDetails = DB::table('connection_requests')
        ->where('connection_requests.employee_id', '=', $employeeID)
        ->where('connection_requests.status', '=', 0)
        ->join('users', 'connection_requests.hirer_id', '=', 'users.id')
        ->select('users.*')
        ->get();
        if($hirerDetails->isEmpty()){
            $hirerDetails = array();        
        }
        return view('employee/dashboard',array('hirerDetails'=>$hirerDetails));
    }

    /*to save employee details*/
    public function saveEmployee(Request $request)
    {
        $userId = $request->input('user_id');
        $validatedData = $request->validate([
            'name'          => 'required',
            'skills'        => 'required|array',
            'experience'    => 'required|numeric',
            'locations'     => 'required|array',
            'current_ctc'   => 'required|numeric',
            'expected_ctc'  => 'required|numeric',
            'notice_period' => 'required'
        ], [
            'name.required'         => 'Name is required',
            'skills.required'       => 'Skill is required',
            'experience.required'   => 'Experience is required',
            'locations.required'    => 'Location is required',
            'current_ctc.required'  => 'Current CTC is required',
            'expected_ctc.required' => 'Expected CTC is required',
            'notice_period.required' => 'Notice Period is required'
        ]);
        if ($userId) {
            $employee = Employee::find($userId);
        } else {
            $employee = new Employee;
        }
        $employee->name            = $validatedData['name'];
        $employee->experience      = $validatedData['experience'];
        $employee->current_ctc     = $validatedData['current_ctc'];
        $employee->expected_ctc    = $validatedData['expected_ctc'];
        $employee->notice_period   = $validatedData['notice_period'];
        $employee->user_id         = auth()->id();
        $employee->locations       = json_encode($validatedData['locations']);
        if ($userId) {
            DB::table('employee_skills')->where('employee_id', $userId)->delete();
            $employee->update();
        } else {
            $employee->save();
            $employeeID = $employee->id;
            $request->session()->put('employee-id', $employeeID);
        }
        foreach ($validatedData['skills'] as $skills) {
            $EmployeeSkills = new EmployeeSkills();
            $EmployeeSkills->skills = $skills;
            $EmployeeSkills->employee_id = $employee->id;
            $EmployeeSkills->save();
        }
        return redirect()->route('employee-dashboard');
    }

    public function chatView()
    {
        $users_list = User::whereIn('role', ['Hirer', 'Employee'])->whereNotIn('id', [Auth::id()])->get();
        return view('chat.employeeChatInbox', compact('users_list'));
    }
}
