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
	            return view('admin/dashboard');
	        }
	    }else{
	    	return redirect('/admin/login');
	    }
    }
}
