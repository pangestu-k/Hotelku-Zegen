<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotelku\AuthController;
use App\Http\Controllers\Hotelku\OrderController;
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
    Route::get('room/detail/{id}', [RoomController::class, 'detail'])->name('room.detail');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('editProfile', [ProfileController::class, 'editProfile'])->name('editProfile.get');
    Route::post('editProfile', [ProfileController::class, 'editProfileStore'])->name('editProfile.store');
    Route::get('editPassword', [ProfileController::class, 'editPassword'])->name('editPassword.get');
    Route::post('editPassword', [ProfileController::class, 'editPasswordStore'])->name('editPassword.store');
    Route::post('logout', [ProfileController::class, 'logout'])->name('user.logout');
    Route::post('addPhoto', [ProfileController::class, 'addPhoto'])->name('addPhoto.store');

    Route::get('order-user/{id}', [OrderController::class, 'order_user'])->name('order.user');
    Route::get('order-room/{id}', [OrderController::class, 'order_room'])->name('order.room');
    Route::post('order-now/{id}', [OrderController::class, 'order_store'])->name('order.store');
    Route::post('order-confirm/{id}', [OrderController::class, 'order_confirm'])->name('order.confirm');
    Route::get('order-resheadule/{id}', [OrderController::class, 'rescheadule'])->name('order.resheadule_get');
    Route::post('order-resheadule/{id}', [OrderController::class, 'rescheadule_store'])->name('order.resheadule_store');

    Route::get('about', function () {
        return view('about');
    })->name('about');
});
