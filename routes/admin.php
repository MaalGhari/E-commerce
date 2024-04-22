<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\auth\AdminLoginController;
use App\Http\Controllers\Admin\auth\AdminRegisterController;
use App\Http\Controllers\ProductController;
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
        Route::get('users/profile', [AdminProfileController::class, 'editProfile'])->name('users.edit-profile');
        Route::put('users/profile', [AdminProfileController::class, 'updateProfile'])->name('users.update-profile');
        Route::get('users/list', [AdminUsersController::class, 'listUsers'])->name('users.list');
        Route::delete('users/disable/{id}', [AdminUsersController::class, 'disableUser'])->name('users.disable');
        Route::put('users/enable/{id}', [AdminUsersController::class, 'enableUser'])->name('users.enable');
        

        // Routes pour les administrateurs
        Route::delete('admins/disable/{id}', [AdminUsersController::class, 'disableAdmin'])->name('admins.disable');
        Route::put('admins/enable/{id}', [AdminUsersController::class, 'enableAdmin'])->name('admins.enable');

        Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/{id}', [AdminProductController::class, 'details'])->name('admin.products.details');
        Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
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
