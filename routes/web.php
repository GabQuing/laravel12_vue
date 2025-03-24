<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('product', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('product');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.destroy');
Route::get('/product/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->middleware(['auth', 'verified']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
