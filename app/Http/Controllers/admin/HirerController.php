<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HirerController extends Controller
{
    public function index(){
    	$user = auth()->user();
    	if(!empty($user)){
	        if($user->role != 'Admin'){
	            return redirect('/admin/login');
	        }else{
	            return view('admin/hirer');
	        }
	    }else{
	    	return redirect('/admin/login');
	    }
    }
}
