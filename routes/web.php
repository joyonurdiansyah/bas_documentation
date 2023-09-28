<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', [DashboardController::class, 'home']);


// dashboard utama
Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard.index');
Route::get('/dashboard/image', [DashboardController::class, 'showImage'])->name('dashboard.show.image');


// admin panel card
Route::get('/dashboard-admin/card', [AdminController::class, 'card'])->name('dashboard.show.card');
// post card
Route::post('/dashboard-admin/store-card', [AdminController::class, 'storeCard'])->name('dashboard.store.card');
// catch response dokumentasi card
Route::get('/dashboard-admin/get-all-card', [AdminController::class, 'dataDokumen'])->name('dashboard.all.dokumentasi');
// catch name judul dokumentasi card from object
Route::get('/dashboard-admin/get-single-card', [AdminController::class, 'cariDokumen'])->name('dashboard.cari.dokumen');

// admin panel dashboard
Route::get('/dashboard-admin/dashboard-utama', [AdminController::class, 'dashboard'])->name('dashboard.table');
// admin post content dashboard
Route::get('/dashboard-admin/detail/{id}', [AdminController::class, 'detail'])->name('dashboard.post.detail');
// admin post store langkah
Route::post('/dashboard-admin/store-post', [AdminController::class, 'createLangkah'])->name('dashboard.store.langkah');
// admin store sub langkah
Route::post('/dashboard-admin/sub-langkah', [AdminController::class, 'createSubLangkah'])->name('dashboard.store.sublangkah');
// admin delete sub langkah id
Route::post('/dashboard-admin/sub-langkah-deleted', [AdminController::class, 'deleteSubLangkah'])->name('dashboard.delete.sublangkah');
// admin delete langkah
Route::post('/dashboard-admin/langkah-deleted', [AdminController::class, 'deleteLangkah'])->name('dashboard.delete.langkah');
// get page admin faq
Route::get('/dashboard-admin/faq/{id}', [AdminController::class, 'detailFaq'])->name('dashboard.faq');
// store faq 
Route::post('/dashboard-admin/store-faq', [AdminController::class, 'storeFaq'])->name('dashboard.store.faq');
// faq deleted
Route::post('/dashboard-admin/deleted-faq', [AdminController::class, 'deleteFaq'])->name('dashboard.delete.faq');
// cetak user manual
Route::get('/dashboard-admin/cetak-user-manual/{id}', [AdminController::class, 'cetakPdfManual']);

// testing pdf
Route::get('/dashboard-admin/view/pdf/{id}', [AdminController::class, 'view_pdf']);



// dokumentasi sigra
Route::get('/{slug}', [SigraController::class, 'index'])->name('sigra.index');
