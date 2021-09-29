<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirerController;
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
    return view('welcome');
});

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

<<<<<<< HEAD
Route::get('hirer',[HirerController::class,'index']);

Route::post('save_hirer',[HirerController::class,'saveHirer']);
=======
Route::get('recruiter',[RecruiterController::class,'index']);
>>>>>>> 0c533e526cd027cad535bb20f6fd7b2f646269f4
