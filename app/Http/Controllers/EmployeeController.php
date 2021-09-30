<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeSkills;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller{


    public function index(){
        $id = auth()->id();
        $employeeDetails = DB::table('employees')
        ->where('employees.id', '=', $id)
        ->groupBy('employees.id')
        ->join('employee_skills', 'employees.id', '=', 'employee_skills.employee_id')
        ->select('employees.*')
        ->selectRaw('GROUP_CONCAT(employee_skills.skills) as skills')
        ->get();
        if(!empty($employeeDetails[0])){
            $data = (array)$employeeDetails[0];
            return view('employee-signup', ['employeeDetails'=>$data]);
        }else{
            return view('employee-signup');
        }
    }

    public function saveEmployee(Request $request){
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
            'notice_period.required'=> 'Notice Period is required'
        ]);

        if($userId){
            $employee = Employee::find($userId);
        }else{
            $employee                  = new Employee;
        }
        $employee->name            = $validatedData['name'];
        $employee->experience      = $validatedData['experience'];
        $employee->current_ctc     = $validatedData['current_ctc'];
        $employee->expected_ctc    = $validatedData['expected_ctc'];
        $employee->notice_period   = $validatedData['notice_period'];
        $employee->locations       = json_encode($validatedData['locations']);
        if($userId){
            DB::table('employee_skills')->where('employee_id', $userId)->delete();
            $employee->update();
        }else{
            $employee->save();
        }
        foreach ($validatedData['skills'] as $skills) {
            $EmployeeSkills = new EmployeeSkills();
            $EmployeeSkills->skills = $skills;
            $EmployeeSkills->employee_id = $employee->id;
            $EmployeeSkills->save();
        }

        if(!$userId){
            return back()->with('success', 'Employee Created Successfully');
        }else{
            return redirect()->back()->with('success','Employee Updated Successfully');
        }
    }
}