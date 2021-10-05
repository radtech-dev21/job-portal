<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
    	$user = auth()->user();
    	if(!empty($user)){
	        if($user->role != 'Admin'){
	            return redirect('/admin/login');
	        }else{
	        	$data = array();
	        	$data['page_name'] = 'Dashboard';
	            return view('admin/dashboard',array('data' => $data));
	        }
	    }else{
	    	return redirect('/admin/login');
	    }
    }
}
