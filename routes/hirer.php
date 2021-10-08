<?php
use App\Http\Controllers\{HirerController, ConnectionController};
Route::group(['prefix' => 'hirer', Auth::check() => 'role:hirer'], function () {
	Route::get('chat', [HirerController::class, 'chatView'])->name('chat');
});
Route::group(['prefix' => 'hirer',  'middleware' => 'auth'], function(){
	Route::post('save',[HirerController::class,'saveCompany'])->name('save-company');
	Route::get('dashboard',[HirerController::class,'hirerDashboard'])->name('hirer-dashboard');
	Route::get('create-company', [HirerController::class, 'index'])->name('create-company');
});
