<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sigra\SigraController;
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

// dokumentasi sigra
Route::get('/sigra/index', [SigraController::class, 'index'])->name('sigra.index');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard.index');
