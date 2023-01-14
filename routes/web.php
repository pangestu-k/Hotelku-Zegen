<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotelku\AuthController;
use App\Http\Controllers\Hotelku\RoomController;
use App\Http\Controllers\Hotelku\ProfileController;
use App\Http\Controllers\Hotelku\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register-store', [AuthController::class, 'register_store'])->name('user.register');
    Route::post('login-store', [AuthController::class, 'login_store'])->name('user.login');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

    Route::get('room', [RoomController::class, 'room'])->name('room.index');
    Route::get('room-category/{id}', [RoomController::class, 'room_category'])->name('room.category');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('editProfile', [ProfileController::class, 'editProfile'])->name('editProfile.get');
    Route::post('editProfile', [ProfileController::class, 'editProfileStore'])->name('editProfile.store');
    Route::get('editPassword', [ProfileController::class, 'editPassword'])->name('editPassword.get');
    Route::post('editPassword', [ProfileController::class, 'editPasswordStore'])->name('editPassword.store');
    Route::post('logout', [ProfileController::class, 'logout'])->name('user.logout');
    Route::post('addPhoto', [ProfileController::class, 'addPhoto'])->name('addPhoto.store');

    Route::get('donation/list', [DonationController::class, 'index'])->name('donation.index');
    Route::get('donation/detail', [DonationController::class, 'detail'])->name('donation.detail');
    Route::get('about', function () {
        return view('about');
    })->name('about');
});
