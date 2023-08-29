<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Controller;

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
    return view('welcome');
});

// Route::group(['middleware' => ['auth']], function () {
// });

Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('forgot.password');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('reset.password');


Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('new-password', [NewPasswordController::class, 'newPassword'])->name('new-password.post');
Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword'])->name('forgot-password.post');
Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password.post');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('home', [Controller::class, 'showHome'])->name('home');
    Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::get('new-password', [NewPasswordController::class, 'showNewPassword'])->name('new.password');

});
