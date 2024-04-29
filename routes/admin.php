<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPromotionController;
use App\Http\Controllers\Admin\AdminUsersController;
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
        Route::get('users/profile', [AdminProfileController::class, 'editProfile'])->name('users.edit-profile');
        Route::put('users/profile', [AdminProfileController::class, 'updateProfile'])->name('users.update-profile');
        Route::get('users/list', [AdminUsersController::class, 'listUsers'])->name('users.list');
        Route::delete('users/disable/{id}', [AdminUsersController::class, 'disableUser'])->name('users.disable');
        Route::put('users/enable/{id}', [AdminUsersController::class, 'enableUser'])->name('users.enable');
        // Routes pour les administrateurs
        Route::delete('admins/disable/{id}', [AdminUsersController::class, 'disableAdmin'])->name('admins.disable');
        Route::put('admins/enable/{id}', [AdminUsersController::class, 'enableAdmin'])->name('admins.enable');

        Route::prefix('products')->name('admin.')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('products.index');
            Route::get('/search', [AdminProductController::class, 'search'])->name('products.search');
            Route::get('/filter', [AdminProductController::class, 'filter'])->name('products.filter');
            Route::get('/create', [AdminProductController::class, 'create'])->name('products.create');
            Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('products.edit');
            Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('products.update');
            Route::get('/{id}', [AdminProductController::class, 'details'])->name('products.details');
            Route::delete('/delete/{id}', [AdminProductController::class, 'delete'])->name('products.delete');
        });
        

        Route::prefix('categories')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [AdminCategoryController::class, 'create'])->name('categories.create');
            Route::post('/store', [AdminCategoryController::class, 'store'])->name('categories.store');
            Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
            Route::delete('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('categories.delete');
        });

        Route::prefix('promotions')->group(function () {
            Route::get('/', [AdminPromotionController::class, 'index'])->name('promotions.index');
            Route::get('/create', [AdminPromotionController::class, 'create'])->name('promotions.create');
            Route::post('/store', [AdminPromotionController::class, 'store'])->name('promotions.store');
            Route::get('/{id}', [AdminPromotionController::class, 'show'])->name('promotions.show');
            Route::get('/edit/{id}', [AdminPromotionController::class, 'edit'])->name('promotions.edit');
            Route::put('/update/{id}', [AdminPromotionController::class, 'update'])->name('promotions.update');
            Route::delete('/delete/{id}', [AdminPromotionController::class, 'delete'])->name('promotions.delete');
        });

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
