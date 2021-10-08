<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Admin\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{

    public function index(){
    	$user = auth()->user();
    	if(!empty($user->role) && $user->role == 'Admin'){
    		$data = array();
    		$data['page_name'] = 'Dashboard';
			$total_employee_count = User::where('role', 'Hirer')->count();
    		return view('admin/dashboard',array('data' => $data, 'total_employee_count' => $total_employee_count));
    	}else{
    		return redirect('/admin/login');
    	}
    }
}
