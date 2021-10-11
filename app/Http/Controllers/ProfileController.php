<?php

namespace App\Http\Controllers;
use App\Models\{Employee, EmployeeSkills};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($employeeID){
        $employeeDetails = DB::table('employees')
        ->where('employees.id', '=', $employeeID)
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->join('employee_skills', 'employees.id', '=', 'employee_skills.employee_id')
        ->select('*')
        ->selectRaw('GROUP_CONCAT(employee_skills.skills) as skills')
        ->first();
    	return view('hirer/employee-details',array('details'=>$employeeDetails));
    }
}
