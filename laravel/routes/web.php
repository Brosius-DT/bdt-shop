<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;

// ------------------- SPA‑SEITEN (Inertia) -------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [HomeController::class, 'show'])->name('product.show');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

// ------------------- REINE BLADE‑SEITEN -------------------
Route::view('/impressum', 'pages.imprint')->name('imprint');
Route::view('/datenschutz', 'pages.privacy')->name('privacy');
Route::view('/agb', 'pages.terms')->name('terms');