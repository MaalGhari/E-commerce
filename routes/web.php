<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/product/all', [ProductController::class, 'index'])->name('product.all');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/store/{id}', [ProductController::class, 'storeComment'])->name('product.rate.store');

Route::middleware('verified')->group(function(){
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
