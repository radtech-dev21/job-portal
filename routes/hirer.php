<?php
use App\Http\Controllers\{HirerController, ConnectionController};
Route::group(['prefix' => 'hirer', Auth::check() => 'role:hirer'], function () {
	Route::get('chat', [HirerController::class, 'chatView'])->name('chat');
});
Route::group(['prefix' => 'hirer',  'middleware' => 'auth'], function(){
	Route::post('save',[HirerController::class,'saveHirer']);
	Route::get('dashboard',[HirerController::class,'index'])->name('hirer-dashboard');
});
