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

Route::get('hirer',[HirerController::class,'index']);
Route::post('save_hirer',[HirerController::class,'saveHirer']);
Route::get('verify_user', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser'])->name('verified');
Route::get('employee',[EmployeeController::class,'index']);
Route::post('save_employee',[EmployeeController::class,'saveEmployee']);
