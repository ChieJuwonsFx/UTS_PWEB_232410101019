<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'loginRequest'])->name('login.request');
Route::post('logout', [PageController::class, 'logout'])->name('logout');

Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/pengelolaan/create', [PageController::class, 'pengelolaanCreate'])->name('pengelolaan.create');
Route::post('/pengelolaan/create', [PageController::class, 'pengelolaanStore'])->name('pengelolaan.store');

Route::get('/dashboard/{username}', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile/{username}', [PageController::class, 'profile'])->name('profile');