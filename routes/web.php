<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [CarController::class, 'index'])->name('home');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Admin Route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(UserController::class)->group(function () {
        Route::get('users/{users}/view', 'show');
        Route::get('users', 'index');
        Route::get('users/create', 'create');
        Route::post('users', 'store')->name('users.store');
        Route::get('users/{user}/edit', 'edit');
        Route::put('users/{user}', 'update');
        Route::delete('users/{user}/delete', 'destroy');
        Route::get('users/', 'search');
    });

    Route::controller(CarController::class)->group(function() {
        Route::get('cars/{cars}/view', 'show');
        Route::get('cars', 'index');
        Route::get('cars/create', 'create');
        Route::post('cars', 'store')->name('cars.store');
        Route::get('cars/{car}/edit', 'edit');
        Route::put('cars/{car}', 'update');
        Route::delete('cars/{car}/delete', 'destroy');
    });
});
