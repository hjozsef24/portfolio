<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoomController;
use App\Models\Booking;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{roomNumber}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/booking', [Booking::class, 'show'])->name('rooms.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes();