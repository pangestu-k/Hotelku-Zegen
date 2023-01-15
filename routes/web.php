<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Hotelku\AuthController;
use App\Http\Controllers\Hotelku\RoomController;
use App\Http\Controllers\Hotelku\OrderController;
use App\Http\Controllers\Hotelku\ProfileController;
use App\Http\Controllers\Hotelku\WelcomeController;

use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RommAdminController;


Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register-store', [AuthController::class, 'register_store'])->name('user.register');
    Route::post('login-store', [AuthController::class, 'login_store'])->name('user.login');
});

Route::group(['middleware' => 'auth'], function () {
    # awal user side
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
    # akhir dari user side

    # awal admin side
});
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('floor', [FloorController::class, 'list'])->name('floor.list');
Route::post('floor', [FloorController::class, 'store'])->name('floor.store');
Route::get('floor-edit/{id}', [FloorController::class, 'edit'])->name('floor.edit');
Route::put('floor-edit/{id}', [FloorController::class, 'update'])->name('floor.update');
Route::delete('floor/{id}', [FloorController::class, 'delete'])->name('floor.delete');
Route::get('type', [TypeController::class, 'list'])->name('type.list');

Route::get('room-admin', [RommAdminController::class, 'list'])->name('room-admin.list');
Route::post('room-admin', [RommAdminController::class, 'store'])->name('room-admin.store');
Route::get('room-admin/{id}', [RommAdminController::class, 'edit'])->name('room-admin.edit');
Route::get('room-admin/detail/{id}', [RommAdminController::class, 'show'])->name('room-admin.show');
Route::put('room-admin/{id}', [RommAdminController::class, 'update'])->name('room-admin.update');
Route::delete('room-admin{id}', [RommAdminController::class, 'delete'])->name('room-admin.delete');
