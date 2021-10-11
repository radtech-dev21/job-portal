<?php
use App\Http\Controllers\{HirerController, ConnectionController, ProfileController};
Route::group(['prefix' => 'hirer', Auth::check() => 'role:hirer', 'middleware' => 'auth'], function () {
	Route::get('chat', [HirerController::class, 'chatView'])->name('chat');
	Route::post('save',[HirerController::class,'saveCompany'])->name('save-company');
	Route::get('dashboard',[HirerController::class,'hirerDashboard'])->name('hirer-dashboard');
	Route::get('create-company', [HirerController::class, 'index'])->name('create-company');
});
Route::get('employee-profile/{id}', [ProfileController::class, 'index']);
