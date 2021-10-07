<?php
use App\Http\Controllers\EmployeeController;
Route::group(['prefix' => 'employee',  'middleware' => 'auth'], function(){
	Route::post('save',[EmployeeController::class,'saveEmployee'])->name('save-employee');
	Route::get('dashboard',[EmployeeController::class,'employeeDashboard'])->name('employee-dashboard');
	Route::get('add', [EmployeeController::class, 'index'])->name('add-employee');
});