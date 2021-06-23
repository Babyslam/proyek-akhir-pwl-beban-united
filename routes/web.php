<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TipeWisataController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPelangganController;
use App\Http\Controllers\UserBookingController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::resource('kabupaten', KabupatenController::class)->middleware('auth');
Route::resource('kecamatan', KecamatanController::class)->middleware('auth');
Route::resource('tipe_wisata', TipeWisataController::class)->middleware('auth');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::resource('hotel', HotelController::class)->middleware('auth');
Route::resource('wisata', WisataController::class)->middleware('auth');
Route::resource('booking', BookingController::class)->middleware('auth');
Route::get('booking/cetak_pdf/{booking}', [BookingController::class, 'cetak_pdf'])->name('booking.cetak_pdf');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/wisata', [UserController::class, 'wisata'])->name('user.wisata');
    Route::get('/hotel', [UserController::class, 'hotel'])->name('user.hotel');
});

Route::resource('user_pelanggan', UserPelangganController::class)->middleware('auth');
Route::resource('user_booking', UserBookingController::class)->middleware('auth');
Route::get('user_booking/cetak_pdf/{booking}', [BookingController::class, 'cetak_pdf'])->name('user_booking.cetak_pdf');