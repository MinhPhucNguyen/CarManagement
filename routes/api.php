<?php

use App\Http\Controllers\Api\v2\UserController;
use App\Http\Controllers\Api\v2\CarController;
use App\Http\Controllers\Api\v2\BlogController as V2_BlogController;
use App\Http\Controllers\Api\v2\BrandController;
use App\Http\Controllers\Api\v2\DeleteAccountController;
use App\Http\Controllers\Api\v2\FeatureController;
use App\Http\Controllers\Api\v2\FavoriteController;
use App\Http\Controllers\Api\v2\ProfileController;
use App\Http\Controllers\Api\v2\SearchCarController;
use App\Http\Controllers\Api\v2\UploadImageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PhoneVerificationController;
use App\Http\Controllers\Mail\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::middleware('auth:api')->get('/user', 'getUserInfo');
    Route::post('/register', 'register');
    Route::middleware('auth:api')->post('/logout', 'logout');
});
Route::get('/email-verification', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::get('/phone-verification', [PhoneVerificationController::class, 'verify']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);
Route::get('/authorize/{provider}/redirect', [SocialAuthController::class, 'redirectToProvider']);
Route::get('/authorize/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);


Route::prefix('v2')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::post('send-email', [MailController::class, 'sendEmail']);

        Route::controller(UserController::class)->group(function () {
            Route::get('users', 'index');
            Route::get('users/all', 'selectAllUser');
            Route::get('users/{id}', 'getUserById');
            Route::post('users/create', 'createUser');
            Route::put('users/{id}/edit', 'editUser');
            Route::delete('users/{id}/delete', 'deleteUser');
            Route::delete('users/delete-multi-user/{users}', 'deleteMultiUser');
        });

        Route::delete('users/{id}/remove-avatar', [ProfileController::class, 'removeAvatar']);

        Route::controller(FeatureController::class)->group(function () {
            Route::get('features', 'index');
            Route::post('features/create', 'create');
            Route::put('features/{id}/update', 'update');
            Route::delete('features/{id}/delete', 'delete');
        });

        Route::controller(CarController::class)->group(function () {
            Route::get('cars', 'index');
            Route::post('cars/create', 'store');
            Route::get('cars/{id}/edit', 'edit');
            Route::post('cars/{id}/update', 'update');
            Route::delete('cars/{id}/{filename}/remove-image', 'destroyImage');
            Route::delete('cars/{id}/delete', 'destroy');
        });

        Route::controller(BrandController::class)->group(function () {
            Route::get('brands', 'index');
            Route::post('brands/create', 'create');
            Route::post('brands/{id}/update', 'update');
            Route::delete('brands/{id}/delete', 'delete');
        });

        Route::controller(V2_BlogController::class)->group(function () {
            Route::get('blogs', 'index');
            Route::get('blogs/{id}', 'getBlogById');
            Route::post('blogs/create', 'createBlog');
            Route::post('blogs/{id}/update', 'updateBlog');
            Route::delete('blogs/{id}/delete', 'deleteBlog');
        });
        Route::post('upload', [UploadImageController::class, 'uploadImage']);
    });

    /**
     * TODO: SEARCH CAR
     */
    Route::post('search-filter-car', [SearchCarController::class, 'searchCar']);

    /**
     *  TODO: CHANGE AVATAR
     */
    Route::post('users/{id}/update-avatar', [ProfileController::class, 'updateAvatar']);

    /**
     * TODO: RESET PASSWORD
     */
    Route::middleware('auth:api')->post('users/{id}/change-password', [ChangePasswordController::class, 'changePassword']);

    /**
     * TODO: API FOR PUBLIC PAGE
     */
    //User API
    Route::controller(UserController::class)->group(function () {
        Route::patch('users/{id}/update-infor', 'updateInfor');
        Route::patch('users/{id}/update-phone', 'updatePhoneNumber');
        Route::patch('users/{id}/update-email', 'updateEmail');
        Route::post('users/{id}/send-email-verification', 'sendVerificationEmail');
        Route::post('users/{id}/send-phone-verification', 'sendVerificationPhone');
        Route::post('users/verification-now', 'verificationNow');
    });

    //Delete account
    Route::middleware('auth:api')->delete('users/{id}/delete-account', [DeleteAccountController::class, 'deleteAccount']);

    //Favorite car
    Route::middleware('auth:api')->controller(FavoriteController::class)->group(function () {
        Route::get('fav/favorite-cars', 'favoriteCars');
        Route::post('fav/add-car/{carId}', 'addCar');
        Route::post('fav/remove-car/{carId}', 'removeCar');
    });

    // Car API
    Route::controller(CarController::class)->group(function () {
        Route::get('cars', 'index');
        Route::get('cars/randomCars', 'getRandomCars');
        Route::get('car/detail', 'show');
    });

    // Blog API
    Route::get('blogs', [V2_BlogController::class, 'index']);
    Route::get('blogs/{slug}', [V2_BlogController::class, 'getBlogBySlug']);
});
