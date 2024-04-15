<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatsController;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']],function(){
    Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
    Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'middleware' => ['auth']], function(){
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
});
