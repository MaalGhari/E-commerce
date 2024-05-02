<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserOrderController;
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


Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
 

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome')->middleware('guest');

Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
Route::get('/products/{id}', [UserProductController::class, 'details'])->name('user.products.details');
Route::get('/products/show/{id}', [UserProductController::class, 'show'])->name('user.products.show');
Route::post('/products/store/{id}', [UserProductController::class, 'storeComment'])->name('user.products.rate.store');
Route::get('/search', [UserProductController::class, 'search'])->name('user.products.search');
Route::get('/filter', [UserProductController::class, 'filter'])->name('user.products.filter');
Route::get('cart', [UserProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [UserProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [UserProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [UserProductController::class, 'remove'])->name('remove_from_cart');


Auth::routes(['verify' => true]);


Route::middleware('verified')->group(function(){
    // User profile routes
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/user/profile/edit', [ProfileController::class, 'editProfile'])->name('users.edit-profile');
    Route::put('/user/profile/update', [ProfileController::class, 'updateProfile'])->name('users.update-profile');

    // Cart routes
    // Route::prefix('cart')->group(function () {
    //     Route::get('/', [UserCartController::class, 'index'])->name('user.cart.index');
    //     Route::post('/add', [UserCartController::class, 'addProduct'])->name('user.cart.add');
    //     Route::put('/{itemId}/update', [UserCartController::class, 'updateProduct'])->name('user.cart.update');
    //     Route::delete('/{itemId}/remove', [UserCartController::class, 'removeProduct'])->name('user.cart.remove');
    // });

    // Order routes
    // Route::prefix('orders')->group(function () {
    //     Route::get('/', [UserOrderController::class, 'index'])->name('user.orders.index');
    //     Route::get('/create', [UserOrderController::class, 'create'])->name('user.orders.create');
    //     Route::post('/', [UserOrderController::class, 'store'])->name('user.orders.store');
    //     Route::get('/{id}/edit', [UserOrderController::class, 'edit'])->name('user.orders.edit');
    //     Route::put('/{id}', [UserOrderController::class, 'update'])->name('user.orders.update');
    //     Route::delete('/{id}', [UserOrderController::class, 'destroy'])->name('user.orders.destroy');
    // });
    
});


