<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /*function to load Employee Signup view*/
    public function index(){
        return view('employee-signup');
    }

    /*function to save Hirer data*/
    public function saveEmployee(Request $request){
        $validatedData = $request->validate([
            'name' 			=> 'required',
            'skills' 		=> 'required|array',
            'experience' 	=> 'required|numeric',
            'locations' 	=> 'required|array',
            'current_ctc'	=> 'required|numeric',
            'expected_ctc' 	=> 'required|numeric',
            'notice_period' => 'required'
        ], [
            'name.required' 	    => 'Name is required',
            'skills.required' 		=> 'Skill is required',
            'experience.required' 	=> 'Experience is required',
            'locations.required' 	=> 'Location is required',
            'current_ctc.required' 	=> 'Current CTC is required',
            'expected_ctc.required' => 'Expected CTC is required',
            'notice_period.required'=> 'Notice Period is required'
        ]);
        $employee 			       = new Employee;
        $employee->name            = $validatedData['name'];
        $employee->skills          = json_encode($validatedData['skills']);
        $employee->experience      = $validatedData['experience'];
        $employee->locations       = json_encode($validatedData['locations']);
        $employee->current_ctc     = $validatedData['current_ctc'];
        $employee->expected_ctc    = $validatedData['expected_ctc'];
        $employee->notice_period   = $validatedData['notice_period'];
        $employee->save();
        return back()->with('success', 'Employee created successfully.');
    }
}
