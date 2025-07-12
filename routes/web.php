<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{id}', [CategoryController::class, 'show'])->name('category.products');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/me', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('/manage')->group(function () {
    Route::get('/', [AdminUserController::class, 'show'])->name('manage.show');
    Route::get('/users', [AdminUserController::class, 'getAll'])->name('manage.users');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('manage.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'delete'])->name('manage.users.delete');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('manage')->name('manage.')->group(function () {
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}/json', [AdminProductController::class, 'showJson'])->name('products.showJson');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products', [AdminProductController::class, 'create'])->name('products.create');
});
