<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AdminController::class, 'login'])->middleware('guest')->name('admin.login');
Route::post('admin/login', [AdminController::class, 'store'])->middleware('guest')->name('admin.login');

Route::resource('booking', BookingController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::post('booking/{booking}/cancel', [BookingController::class, 'cancel'])->middleware('can:update,booking')->name('booking.cancel');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';