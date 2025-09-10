<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome'); // 👈 Ajoute ce name


// Page liste des branches
Route::get('/branche', function () {
    return view('branche'); // resources/views/branche.blade.php
})->name('branche');

// Page Santos (accessible seulement via "branche")
Route::get('/branche/santos', function () {
    return view('santos'); // resources/views/santos.blade.php
})->name('branche.santos');

Route::get('/santos', [PostController::class, 'index'])->name('branche.santos');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts/{post}/like', [PostController::class, 'like']);
Route::post('/posts/{post}/heart', [PostController::class, 'heart']);

Route::post('/dons', [DonController::class, 'store'])->name('dons.store');
Route::get('/dons', [DonController::class, 'dons'])->name('dons');
    
Route::get('/news', [NewsController::class, 'index'])->name('news');

