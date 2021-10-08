<?php
use App\Http\Controllers\EmployeeController;
Route::group(['prefix' => 'employee',  'middleware' => 'auth'], function(){
	Route::get('create', [EmployeeController::class, 'index'])->name('create-employee');
	Route::get('chat', [EmployeeController::class, 'chatView']);
	Route::post('save',[EmployeeController::class,'saveEmployee'])->name('save-employee');
	Route::get('dashboard',[EmployeeController::class,'employeeDashboard'])->name('employee-dashboard');
});