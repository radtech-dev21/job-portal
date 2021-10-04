<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{

    public function index(){
        return view('admin/dashboard');
    }
}
