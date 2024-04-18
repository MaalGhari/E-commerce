<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\auth\AdminLoginController;
use App\Http\Controllers\Admin\auth\AdminRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('/admin/dashboard/')->name('admin.dashboard.')->group(function(){

    Route::middleware('auth:admin')->group(function(){
        Route::get('home', [AdminHomeController::class, 'index'])->name('home');
    });

    Route::controller(AdminLoginController::class)->group(function(){
        Route::get('login', 'login')->name('login');
        Route::post('login', 'checkLogin')->name('check');
        Route::post('logout', 'logout')->name('logout');
    });

    Route::controller(AdminRegisterController::class)->group(function(){
        Route::get('register', 'register')->name('register');
        Route::post('register', 'store')->name('store');
    });

});

// Route::get('/admin/dashboard/home', [AdminHomeController::class, 'index'])->name('admin.dashboard.home')->middleware('auth:admin');

// Route::get('/admin/dashboard/login', [AdminLoginController::class, 'login'])->name('admin.dashboard.login');
// Route::post('/admin/dashboard/login', [AdminLoginController::class, 'checkLogin'])->name('admin.dashboard.check');

// Route::get('/admin/dashboard/register', [AdminRegisterController::class, 'register'])->name('admin.dashboard.register');
// Route::post('/admin/dashboard/register', [AdminRegisterController::class, 'store'])->name('admin.dashboard.store');

// Route::post('/admin/dashboard/logout', [AdminLoginController::class, 'logout'])->name('admin.dashboard.logout');
