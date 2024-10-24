<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Statistic\StatisticController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function() {
        Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
        Route::get('{user}', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('{user}/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::resource('products', ProductController::class);

    Route::get('statistic', [StatisticController::class, 'show'])->name('statistic');
});
