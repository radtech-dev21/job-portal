<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Models\User;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*function to load login view*/
    public function index(){
        return view('admin/auth/login');
    }

    /*function to verify the authenticated user*/
    public function verifyUser(Request $request){
        $validatedData = $request->validate([
            'email'          => 'required',
            'password'        => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if($user->role == 'Admin'){
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with('error','Not an authenticated user!');
            }
        }else{
            return redirect()->back()->with('error','Invalid Email or Password!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/admin/login');
    }
}
