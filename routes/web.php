<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CoursesContoller;

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/privacy', [HomeController::class, 'static_content']);
Route::get('/terms', [HomeController::class, 'static_content']);
Route::get('/about-us', [HomeController::class, 'static_content']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/faq', [HomeController::class, 'faq']);

Route::get('states/{country_id}',[Controller::class,'states'])->name('states');
Route::get('cities/{state_id}',[Controller::class,'cities'])->name('cities');

Route::middleware(['roleAuth:Admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index']);
    });

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    // Route::prefix('users')->group(function () {
    //     Route::get('/list', [UserController::class, 'user_list']);
    //     Route::post('/list', [UserController::class, 'user_list']);
    //     Route::get('/add', [UserController::class, 'add_user']);
    //     Route::post('/add', [UserController::class, 'user_create']);
    //     Route::get('/edit/{id}', [UserController::class, 'user_edit']);
    //     Route::post('/edit/{id}', [UserController::class, 'user_update']);
    //     Route::get('/change-status/{id}', [UserController::class, 'user_status_change']);
    // });

    Route::prefix('users')->group(function () {
        Route::match(['get','post'],'list/{type}',[UserController::class,'userList'])->name('user_list');
        Route::get('view/{id}',[UserController::class,'viewUser'])->name('view_user');
        Route::match(['get','post'],'add/{type}',[UserController::class,'addUsers'])->name('add_user');
        Route::match(['get','post'],'edit/{type}/{id}',[UserController::class,'editUser'])->name('edit_user');
        Route::match(['get','post'],'status/{id}',[UserController::class,'statusUser'])->name('status_user');
    });

    Route::prefix('packages')->group(function(){
        Route::match(['get','post'],'list',[CoursesContoller::class,'packageList'])->name('package_list');
         Route::match(['get','post'],'add',[CoursesContoller::class,'addPackage'])->name('add_package');
        Route::match(['get','post'],'edit/{id}',[CoursesContoller::class,'editPackage'])->name('edit_package');
        Route::match(['get','post'],'status/{id}',[CoursesContoller::class,'statusPackage'])->name('status_package');
    });

});
