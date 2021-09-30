<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller{
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
        $user = User::where('id', '=', Auth::user()->id)->first();
        if($user != null){
            $email_verification_code = $request->emailOtp;
            if(($user->email_is_verified == 0) && ($user->email_verification_code == $email_verification_code)){
                $user->email_is_verified = 1;
                $user->save();
                return redirect()->route('home')->with(session()->flash('alert-success', 'Your email is verified.!'));
            }
        }else if($user != null){
            $phone_verification_code = $request->phoneOtp;
            if(($user->phone_is_verified == 0) && ($user->phone_verification_code == $phone_verification_code)){
                $user->phone_is_verified = 1;
                $user->save();
                return redirect()->route('home')->with(session()->flash('alert-success', 'Your phone number is verified.!'));
            }
        }

        return redirect()->route('home')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}
