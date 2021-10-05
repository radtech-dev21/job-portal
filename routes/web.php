<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/searchProfile', [App\Http\Controllers\HomeController::class, 'searchProfile'])->name('searchProfile');
/* verification Api */
Route::get('verify_user', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser'])->name('verified');
Route::post('verified', [App\Http\Controllers\Auth\VerificationController::class, 'verifiedUser'])->name('verifications');
Route::get('resend-email-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendEmailOtp'])->name('emailOtp');
Route::get('resend-phone-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendPhoneOtp'])->name('phoneOtp');
Route::group([Auth::check() => 'role:hirer'], function () {
	Route::get('chat', [HirerController::class, 'chatView']);
});
Route::group(['prefix' => 'hirer',  'middleware' => 'auth'], function(){
	Route::post('save',[HirerController::class,'saveHirer']);
	Route::get('dashboard',[HirerController::class,'index'])->name('hirer-dashboard')->middleware('auth');
});

