<?php
use App\Http\Controllers\EmployeeController;
Route::group(['prefix' => 'employee', Auth::check() => 'role:hirer', 'middleware' => 'auth'], function () {
	Route::get('chat', [EmployeeController::class, 'chatView']);
	Route::get('chat', [EmployeeController::class, 'chatView'])->name('employeeChat');
	Route::get('create', [EmployeeController::class, 'index'])->name('create-employee');
	Route::post('save',[EmployeeController::class,'saveEmployee'])->name('save-employee');
	Route::get('dashboard',[EmployeeController::class,'employeeDashboard'])->name('employee-dashboard');
});