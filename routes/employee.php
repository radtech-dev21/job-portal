<?php
use App\Http\Controllers\EmployeeController;
Route::post('save_employee', [EmployeeController::class, 'saveEmployee']);
Route::get('employee', [EmployeeController::class, 'employeeDashboard'])->name('employee')->middleware('auth');
Route::get('employee-add', [EmployeeController::class, 'index'])->name('addEmployee')->middleware('auth');