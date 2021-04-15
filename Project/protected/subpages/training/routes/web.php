<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('added_muscle/login', function () {
    return view('/login');
});


Route::prefix('added_muscle')->group(function () {

    Route::post("/login", [UserController::class, 'login'])->name('login');
    Route::post("/register", [UserController::class, 'register'])->name('register');
    Route::get("/", [ProductController::class, 'index'])->name('home');
    Route::get("/detail/{id}", [ProductController::class, 'detail'])->name('detail');
    Route::get("/search", [ProductController::class, 'search'])->name('search');
    Route::post("/add_to_cart", [ProductController::class, 'addToCart'])->name('add_to_cart');
    Route::get("/cart", [ProductController::class, 'cartList'])->name('cart');
    Route::get("/removecart/{id}", [ProductController::class, 'removeCart'])->name('removecart');
    Route::get("/ordernow", [ProductController::class, 'orderNow'])->name('ordernow');
    Route::post("/orderplace", [ProductController::class, 'orderPlace'])->name('orderplace');
    Route::get("/myorders", [ProductController::class, 'myOrders'])->name('myorders');
    Route::get("/products", [ProductController::class, 'allProduct'])->name('products');
    Route::get('/logout', function () {
        Session::forget('user');
        return redirect()->route('home');
    })->name('logout');
});


Route::view('added_muscle/register', 'register');
