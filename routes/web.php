<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController as PortalDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WebsiteManagementController;
use App\Http\Controllers\JobApplicationController;

// HALAMAN UTAMA
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// HALAMAN PUBLIK
Route::view('/tentang-kami', 'pages.tentang-kami')
    ->name('about');

Route::view('/legalitas', 'pages.legalitas')
    ->name('legality');

Route::view('/karier', 'pages.karier')
    ->name('careers');

Route::view('/magang', 'pages.magang')
    ->name('internship');

Route::get('/berita', [NewsController::class, 'index'])
    ->name('news');

Route::view('/kontak', 'pages.kontak')
    ->name('contact');

Route::view('/registrasi', 'pages.registrasi')
    ->name('registration');

Route::view('/form-staff', 'pages.form-staff')
    ->name('form.staff');

Route::view('/form-magang', 'pages.form-magang')
    ->name('form.magang');

Route::view('/persyaratan', 'pages.persyaratan')
    ->name('persyaratan');

// LOGIN DAN REGISTRASI

Route::get('/login', function () {
    return redirect()->route('home')
        ->with('open_auth_modal', 'login');
})->name('login');

Route::get('/register', function () {
    return redirect()->route('home')
        ->with('open_auth_modal', 'register');
})->name('register');

Route::middleware('guest')->group(function () {

    Route::post('/auth/login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/auth/register', [AuthController::class, 'register'])
        ->name('auth.register');

});

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// DASHBOARD ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [
            AdminDashboardController::class,
            'index'
        ])->name('dashboard');

        // WEBSITE MANAGEMENT / CMS

        Route::prefix('website')
            ->name('website.')
            ->group(function () {

                Route::get('/visual', [
                    WebsiteManagementController::class,
                    'visual'
                ])->name('visual');

                Route::get('/edit/{page}', [
                    WebsiteManagementController::class,
                    'pageEditor'
                ])->name('edit');

                Route::post('/content', [
                    WebsiteManagementController::class,
                    'saveContent'
                ])->name('save');

            });

    });

// DASHBOARD HRD
Route::middleware(['auth', 'role:hrd'])
    ->prefix('hrd')
    ->name('hrd.')
    ->group(function () {

        Route::get('/dashboard', [
            PortalDashboardController::class,
            'hrd'
        ])->name('dashboard');

    });

// DASHBOARD PELAMAR
Route::middleware(['auth', 'role:pelamar'])
    ->prefix('pelamar')
    ->name('pelamar.')
    ->group(function () {

        Route::get('/dashboard', [
            PortalDashboardController::class,
            'pelamar'
        ])->name('dashboard');

    });

// FORMULIR LAMARAN PELAMAR
Route::middleware(['auth', 'role:pelamar'])->group(function () {

    Route::get('/lamaran/buat', [
        JobApplicationController::class,
        'create'
    ])->name('applications.create');

    Route::post('/lamaran/kirim', [
        JobApplicationController::class,
        'store'
    ])->name('applications.store');

});
