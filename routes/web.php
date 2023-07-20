<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mail\MailController;

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

//Client Route
Route::get('about', [AboutController::class, 'index'])->name('client.about');
Route::get('blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('client.blogs');
Route::get('blogs/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('client.blogs.show');

//Admin Route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('search', [SearchController::class, 'search'])->name('admin.search');
    Route::post('send_email', [MailController::class, 'sendEmail'])->name('sendEmail');

    // User Routes
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index');
        Route::get('users/{users}/show', 'show')->name('users.show');
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

    // ckeditor upload image into content
    Route::post('/upload', [ImageUploadController::class, 'uploadImage'])->name('ckeditor.upload');

    // Blog Routes
    Route::controller(BlogController::class)->group(function () {
        Route::get('blogs', 'index')->name('blogs.index');
        Route::get('blogs/create', 'create')->name('blogs.create');
        Route::post('blogs', 'store')->name('blogs.store');
        Route::get('blogs/{id}/edit', 'edit')->name('blogs.edit');
        Route::put('blogs/{id}', 'update')->name('blogs.update');
        Route::delete('/blogs/{id}', 'destroy')->name('blogs.destroy'); 
    });
});
