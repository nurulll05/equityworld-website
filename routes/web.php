<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebsiteManagementController;

// Mengarahkan ke Controller (Struktur MVC)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Statis Lainnya (Opsional: Bisa lewat Controller atau tetap Route::view)
Route::view('/tentang-kami', 'pages.tentang-kami')->name('about');
Route::view('/legalitas', 'pages.legalitas')->name('legality');
Route::view('/karier', 'pages.karier')->name('careers');
Route::view('/magang', 'pages.magang')->name('internship');
Route::get('/berita', [NewsController::class, 'index'])->name('news');
Route::view('/kontak', 'pages.kontak')->name('contact');
Route::view('/registrasi', 'pages.registrasi')->name('registration');
Route::view('/form-staff', 'pages.form-staff')
    ->name('form.staff');
Route::view('/form-magang', 'pages.form-magang')
    ->name('form.magang');
Route::view('/persyaratan', 'pages.persyaratan')
    ->name('persyaratan');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

// Website Management
Route::prefix('admin/website')->name('admin.website.')->group(function () {

    // Mode Visual
    Route::get('/visual', [
        WebsiteManagementController::class,
        'visual'
    ])->name('visual');

    // Mode Panel
    Route::get('/edit/{page}', [
        WebsiteManagementController::class,
        'pageEditor'
    ])->name('edit');

    Route::post('/content', [
        WebsiteManagementController::class,
        'saveContent'
    ])->name('save');

});