<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProductController::class, 'index'])
        ->name('dashboard');

    Route::resource('kategoris', KategoriController::class);
    Route::resource('products', ProductController::class)->except('index');
    Route::resource('banner', BannerController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
