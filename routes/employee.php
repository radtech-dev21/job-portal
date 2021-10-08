<?php
use App\Http\Controllers\EmployeeController;
Route::group(['prefix' => 'employee', Auth::check() => 'role:hirer'], function () {
	Route::get('chat', [EmployeeController::class, 'chatView'])->name('employeeChat');
});
Route::group(['prefix' => 'employee',  'middleware' => 'auth'], function(){
	Route::post('save',[EmployeeController::class,'saveEmployee'])->name('save-employee');
	Route::get('dashboard',[EmployeeController::class,'employeeDashboard'])->name('employee-dashboard');
	Route::get('create', [EmployeeController::class, 'index'])->name('create-employee');
});