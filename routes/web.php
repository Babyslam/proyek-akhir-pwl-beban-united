<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KabupatenController;
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
Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/kabupaten', [KabupatenController::class, 'kabupaten'])->name('user.kabupaten');
});