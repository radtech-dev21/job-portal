<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserVerifyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verifiedUser(Request $request){
        dd($request->toArray());
        // $verification_code = \Illuminate\Support\Facades\Request::get('code');
        // $user = User::where(['verification_code' => $verification_code])->first();
        // if($user != null){
        //     $user->email_is_verified = 1;
        //     $user->save();
        //     return redirect()->route('home')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        // }

        // return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}
