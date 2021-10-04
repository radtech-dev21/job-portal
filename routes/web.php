<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirerController;
use App\Http\Controllers\EmployeeController;
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
Route::get('/searchProfile', [App\Http\Controllers\HomeController::class, 'searchProfile'])->name('searchProfile');

/* verification Api */
Route::get('verify_user', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser'])->name('verified');
Route::post('verified', [App\Http\Controllers\Auth\VerificationController::class, 'verifiedUser'])->name('verifications');
Route::get('resend-email-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendEmailOtp'])->name('emailOtp');
Route::get('resend-phone-otp', [App\Http\Controllers\Auth\VerificationController::class, 'resendPhoneOtp'])->name('phoneOtp');



//Admin Routes
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index']);
Route::post('/admin/verify_user', [App\Http\Controllers\Admin\Auth\LoginController::class, 'verifyUser']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout']);


Route::get('hirer',[HirerController::class,'index'])->name('hirer')->middleware('auth');
Route::post('hirer/save',[HirerController::class,'saveHirer']);

/* Employee Api */
Route::get('employee',[EmployeeController::class,'employeeDashboard'])->name('employee')->middleware('auth');
Route::get('employee-add',[EmployeeController::class,'index'])->name('employeeAdd')->middleware('auth');
Route::post('save_employee',[EmployeeController::class, 'saveEmployee']);

