<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/category/{category?}', [NewsController::class, 'category'])->name('category');
Route::get('/article/{article}', [NewsController::class, 'show'])->name('article.show');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:20,1');
    Route::view('/register', 'register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:journalist,admin'])->prefix('journalist')->group(function () {
    Route::get('/', [JournalistController::class, 'index'])->name('journalist');
    Route::post('/', [JournalistController::class, 'store'])->name('journalist.store');
    Route::get('/{article}/edit', [JournalistController::class, 'edit'])->name('journalist.edit');
    Route::put('/{article}', [JournalistController::class, 'update'])->name('journalist.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/articles/{article}/edit', [JournalistController::class, 'edit'])->name('admin.edit');
    Route::put('/articles/{article}', [JournalistController::class, 'update'])->name('admin.update');
    Route::patch('/articles/{article}/block', [AdminController::class, 'block'])->name('admin.block');
    Route::delete('/articles/{article}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::patch('/users/{user}/role', [AdminController::class, 'changeRole'])->name('admin.role');
});
