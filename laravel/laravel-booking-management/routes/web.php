<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{roomNumber}', [RoomController::class, 'show'])->name('rooms.show');

Route::middleware('auth')->group(function () {
    Route::get('/booking/{roomNumber}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
});

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/edit/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');