<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request){
    	$user = auth()->user();
    	if(!empty($user)){
	        if($user->role != 'Admin'){
	            return redirect('/admin/login');
	        }else{
	        	$data = array();
	        	$data['page_name'] = 'Employee List';

	        	if ($request->ajax()) {
	        		$data = User::select('*');
	        		//$data = User::select('*')->where('role','=','employee');
	        		return Datatables::of($data)
	        		->addIndexColumn()
	        		->make(true);
	        	}

	            return view('admin/employee',array('data' => $data));
	        }
	    }else{
	    	return redirect('/admin/login');
	    }
    }
}
