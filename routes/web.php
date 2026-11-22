<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController as PortalDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WebsiteManagementController;

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

Route::view('/persyaratan', 'pages.persyaratan')
    ->name('persyaratan');

// LOGIN DAN REGISTRASI

Route::get('/login', function (Request $request) {

    $intendedUrl = $request->session()->get('url.intended');
    $intendedPath = $intendedUrl
        ? parse_url($intendedUrl, PHP_URL_PATH)
        : null;

    $isApplicationFlow = in_array($intendedPath, [
        '/form-staff',
        '/form-magang'
    ], true);

    return redirect()->route('home')
        ->with('open_auth_modal', 'login')
        ->with(
            'auth_context',
            $isApplicationFlow ? 'application' : 'general'
        );

})->name('login');


Route::get('/register', function (Request $request) {

    $intendedUrl = $request->session()->get('url.intended');
    $intendedPath = $intendedUrl
        ? parse_url($intendedUrl, PHP_URL_PATH)
        : null;

    $isApplicationFlow = in_array($intendedPath, [
        '/form-staff',
        '/form-magang'
    ], true);

    return redirect()->route('home')
        ->with('open_auth_modal', 'register')
        ->with(
            'auth_context',
            $isApplicationFlow ? 'application' : 'general'
        );

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
Route::middleware(['auth', 'single.device', 'role:admin'])
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
Route::middleware(['auth', 'single.device', 'role:hrd'])
    ->prefix('hrd')
    ->name('hrd.')
    ->group(function () {

        Route::get('/dashboard', [
            PortalDashboardController::class,
            'hrd'
        ])->name('dashboard');

    });

// DASHBOARD PELAMAR
Route::middleware(['auth', 'single.device', 'role:pelamar'])
    ->prefix('pelamar')
    ->name('pelamar.')
    ->group(function () {

        Route::get('/dashboard', [
            PortalDashboardController::class,
            'pelamar'
        ])->name('dashboard');

        // EDIT PROFIL
            Route::put('/profile', [ProfileController::class, 'update'])
                ->name('profile.update');

        // GANTI PASSWORD
        Route::put('/password', [ProfileController::class, 'updatePassword'])
            ->name('password.update');
    });

// FORMULIR LAMARAN PELAMAR
Route::middleware(['auth', 'single.device', 'role:pelamar'])->group(function () {

    // FORM STAFF
    Route::view('/form-staff', 'pages.form-staff')
        ->name('form.staff');

    // FORM MAGANG
    Route::view('/form-magang', 'pages.form-magang')
        ->name('form.magang');

});