<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingAvailabilityController;
use App\Http\Controllers\ContactFormSubmissionController;

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

Route::get('contact', [ContactFormSubmissionController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactFormSubmissionController::class, 'create'])->name('contact.create')->middleware(ProtectAgainstSpam::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::post('booking/{booking}/cancel', [BookingController::class, 'cancel'])->middleware('can:update,booking')->name('booking.cancel');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin/dashboard', function () {
            return redirect(RouteServiceProvider::HOME);
        })->name('admin.dashboard');

        Route::post('booking/{booking}/confirm', [BookingController::class, 'confirm'])->middleware('can:update,booking')->name('booking.confirm');

        Route::apiResource('availability', BookingAvailabilityController::class)->except(['show']);
    });
});

require __DIR__ . '/auth.php';
