<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/privacy', [HomeController::class, 'static_content']);
Route::get('/terms', [HomeController::class, 'static_content']);
Route::get('/about-us', [HomeController::class, 'static_content']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/faq', [HomeController::class, 'faq']);



Route::middleware(['roleAuth:Admin'])->group(function () {
        
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index']);
    });

    Route::get('dashboard', [UserController::class, 'index']);

    Route::prefix('users')->group(function () {
        Route::get('/list', [UserController::class, 'user_list']);
        Route::post('/list', [UserController::class, 'user_list']);
        Route::get('/add', [UserController::class, 'add_user']);
        Route::post('/add', [UserController::class, 'user_create']);
        Route::get('/edit/{id}', [UserController::class, 'user_edit']);
        Route::post('/edit/{id}', [UserController::class, 'user_update']);
        Route::get('/change-status/{id}', [UserController::class, 'user_status_change']);
    });
    
});
