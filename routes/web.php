<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\WelcomeController;
// use App\Http\Controllers\User\UsersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome')->middleware('guest');

Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
Route::get('/products/{id}', [UserProductController::class, 'details'])->name('user.products.details');
Route::get('/products/show/{id}', [UserProductController::class, 'show'])->name('user.products.show');
Route::post('/products/store/{id}', [UserProductController::class, 'storeComment'])->name('user.products.rate.store');
Route::get('/search', [UserProductController::class, 'search'])->name('user.products.search');
Route::get('/filter', [UserProductController::class, 'filter'])->name('user.products.filter');



Auth::routes(['verify' => true]);


Route::middleware('verified')->group(function(){
    // User profile routes
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/user/profile/edit', [ProfileController::class, 'editProfile'])->name('users.edit-profile');
    Route::put('/user/profile/update', [ProfileController::class, 'updateProfile'])->name('users.update-profile');
    
});


