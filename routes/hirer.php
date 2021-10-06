<?php
use App\Http\Controllers\{HirerController, ConnectionController};
Route::post('hirer/save',[HirerController::class,'saveHirer']);
Route::get('hirer',[HirerController::class,'index'])->name('hirer')->middleware('auth');
Route::group(['prefix' => 'hirer', Auth::check() => 'role:hirer'], function () {
	Route::get('chat', [HirerController::class, 'chatView']);
});
Route::group(['prefix' => 'hirer',  'middleware' => 'auth'], function(){
	Route::post('save',[HirerController::class,'saveHirer']);
	Route::get('dashboard',[HirerController::class,'index'])->name('hirer-dashboard')->middleware('auth');
});
