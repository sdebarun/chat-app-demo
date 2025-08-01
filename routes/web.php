<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth']],function(){
    Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
    Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
    
});


// Auth::routes();
Route::get('login', [AuthenticationController::class,'showLoginForm']);
Route::post('login', [AuthenticationController::class,'authenticate']);
Route::post('logout', [AuthenticationController::class,'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register',[AuthenticationController::class,'register']);
Route::get('/', [PagesController::class, 'index']);

// no middleware - site pages 
Route::post('register-as-consultant', [AuthenticationController::class,'consultantRegistration']);
Route::get('consultants/{id?}', [PagesController::class, 'consultants']);
Route::get('all-categories', [PagesController::class, 'allCategories']);
Route::get('reach-us',[PagesController::class, 'contactUs']);
Route::get('states', [PagesController::class, 'getStates']);
Route::get('astro-shop', [PagesController::class, 'astroMall']);
Route::get('products', [ProductController::class, 'index']);

// auth routes 
Route::group([ 'middleware' => ['auth']], function(){
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    
});
