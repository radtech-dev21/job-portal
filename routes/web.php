<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
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
// Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('hirer',[HirerController::class,'index'])->middleware('auth');
Route::post('hirer/save',[HirerController::class,'saveHirer']);
Route::get('verify_user', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser'])->name('verified');
Route::get('employee',[EmployeeController::class,'index'])->name('employee')->middleware('auth');
Route::post('save_employee',[EmployeeController::class, 'saveEmployee']);

Route::post('verified', [App\Http\Controllers\Auth\VerificationController::class, 'verifiedUser'])->name('verifications');
Route::get('resend-email-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendEmailOtp'])->name('emailOtp');
Route::get('resend-phone-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendPhoneOtp'])->name('phoneOtp');



//Admin Routes
Route::get('/admin', [App\Http\Controllers\Admin\LoginController::class, 'index']);