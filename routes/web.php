
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;


// ==========================================
// HALAMAN UTAMA
// ==========================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================================
// HALAMAN PUBLIK
// ==========================================

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


// ==========================================
// MEMBUKA POPUP LOGIN
// ==========================================

Route::get('/login', function () {

    return redirect()->route('home')
        ->with('open_auth_modal', 'login');

})->name('login');


// ==========================================
// MEMBUKA POPUP REGISTRASI
// ==========================================

Route::get('/register', function () {

    return redirect()->route('home')
        ->with('open_auth_modal', 'register');

})->name('register');


// ==========================================
// PROSES LOGIN DAN REGISTRASI
// ==========================================

Route::middleware('guest')->group(function () {

    Route::post('/auth/login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/auth/register', [AuthController::class, 'register'])
        ->name('auth.register');

});


// ==========================================
// LOGOUT
// ==========================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==========================================
// DASHBOARD ADMIN
// ==========================================

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard');

    });


// ==========================================
// DASHBOARD HRD
// ==========================================

Route::middleware(['auth', 'role:hrd'])
    ->prefix('hrd')
    ->name('hrd.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'hrd'])
            ->name('dashboard');

    });


// ==========================================
// DASHBOARD PELAMAR
// ==========================================

Route::middleware(['auth', 'role:pelamar'])
    ->prefix('pelamar')
    ->name('pelamar.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'pelamar'])
            ->name('dashboard');

    });


// ==========================================
// FORMULIR LAMARAN PELAMAR
// ==========================================

Route::middleware(['auth', 'role:pelamar'])->group(function () {

    // MENAMPILKAN FORMULIR LAMARAN

    Route::get('/lamaran/buat', [
        JobApplicationController::class,
        'create'
    ])->name('applications.create');


    // PROSES PENGIRIMAN LAMARAN

    Route::post('/lamaran/kirim', [
        JobApplicationController::class,
        'store'
    ])->name('applications.store');

});