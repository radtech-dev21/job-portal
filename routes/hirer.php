<?php
use App\Http\Controllers\{HirerController, ConnectionController};
Route::post('hirer/save',[HirerController::class,'saveHirer']);
Route::get('hirer',[HirerController::class,'index'])->name('hirer')->middleware('auth');
