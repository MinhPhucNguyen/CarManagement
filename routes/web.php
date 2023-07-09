<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Register
Route::get('/register', [SignUpController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [SignUpController::class, 'register']);

//Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Admin Route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('search', [SearchController::class, 'search'])->name('admin.search');

    // User Routes
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index');
        Route::get('users/{users}', 'show')->name('users.show');
        Route::get('users/create', 'create')->name('users.create');
        Route::post('users', 'store')->name('users.store');
        Route::get('users/{user}/edit', 'edit')->name('users.edit');
        Route::put('users/{user}', 'update')->name('users.update');
        Route::put('users/{user}/update-avatar', 'updateAvatar')->name('users.updateAvatar');
        Route::get('users/{id}/delete-avatar', 'destroyAvatar')->name('users.destroyAvatar');
        Route::delete('users/{user}', 'destroy')->name('users.destroy');
    });

    // Brand Routes
    Route::get('brand', App\Http\Livewire\Admin\Brand\Index::class)->name('brand');

    // Car Routes
    Route::controller(CarController::class)->group(function () {
        Route::get('cars', 'index')->name('cars.index');
        Route::get('cars/create', 'create')->name('cars.create');
        Route::post('cars', 'store')->name('cars.store');
        Route::get('cars/{id}/edit', 'edit')->name('cars.edit');
        Route::put('cars/{id}', 'update')->name('cars.update');
        Route::get('car_image/{id}/delete', 'destroyImage')->name('destroyImage');
        Route::delete('cars/{id}/delete', 'destroy')->name('cars.destroy');
    });
});
