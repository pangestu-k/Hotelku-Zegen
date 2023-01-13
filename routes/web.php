<?php

use App\Http\Controllers\Hotelku\AuthController;
use App\Http\Controllers\Hotelku\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('editProfile', [ProfileController::class, 'editProfile'])->name('editProfile.get');
Route::post('editProfile', [ProfileController::class, 'editProfileStore'])->name('editProfile.store');
Route::get('editPassword', [ProfileController::class, 'editPassword'])->name('editPassword.get');
Route::post('editPassword', [ProfileController::class, 'editPasswordStore'])->name('editPassword.store');
Route::get('donation/list', [DonationController::class, 'index'])->name('donation.index');
Route::get('donation/detail', [DonationController::class, 'detail'])->name('donation.detail');
Route::get('about', function () {
    return view('about');
})->name('about');
