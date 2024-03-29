<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'phone_no' => ['required', 'string', 'phone_no', '', 'unique:users'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request){
        $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users|max:255',
          'phone_no' => 'required|unique:users|max:10',
          'password' => 'required|min:8|confirmed',
        ]);
        $user = New User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->phone_verification_code = 1234;
        $user->phone_no = $request->phone_no;
        $user->password = Hash::make($request->password);
        $user->email_verification_code = rand(1000,9999);
        $user->save();
        if($user != null){
            MailController::sendSignupEmail($user->name, $user->email, $user->email_verification_code);
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification code.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }

}
