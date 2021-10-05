<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HirerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('/admin/hirer', [HirerController::class, 'index']);
Route::get('/admin/login', [LoginController::class, 'index']);
Route::get('/admin/logout', [LoginController::class, 'logout']);
Route::get('/admin/dashboard', [HomeController::class, 'index']);
Route::get('/admin/employee', [EmployeeController::class, 'index']);
Route::post('/admin/verify_user', [LoginController::class, 'verifyUser']);