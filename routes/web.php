<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\NewsController;
use App\Models\Text;
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

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/journalist', [JournalistController::class, 'index'])->name('journalist');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
    Route::get('/journalist/{article}/edit', [JournalistController::class, 'edit'])->name('journalist.edit');
    Route::put('/journalist/{article}', [JournalistController::class, 'update'])->name('journalist.update');
});

Route::get('/admin', function () {
    return view('admin', ['news' => Text::latest()->get()]);
})->name('admin');
