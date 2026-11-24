<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController as PortalDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WebsiteManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\ForgotPasswordController;

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


// LOGIN, REGISTRASI, DAN LUPA PASSWORD
Route::middleware('guest')->group(function () {

    Route::post('/auth/login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/auth/register', [AuthController::class, 'register'])
        ->name('auth.register');

    // HALAMAN LUPA PASSWORD
    Route::get('/forgot-password', [
        ForgotPasswordController::class,
        'showLinkRequestForm'
    ])->name('password.request');

    // PROSES KIRIM LINK RESET PASSWORD
    Route::post('/forgot-password', [
        ForgotPasswordController::class,
        'sendResetLinkEmail'
    ])->name('password.email');

    // HALAMAN RESET PASSWORD
    Route::get('/reset-password/{token}', [
        ForgotPasswordController::class,
        'showResetForm'
    ])->name('password.reset');

    // PROSES SIMPAN PASSWORD BARU
    Route::post('/reset-password', [
        ForgotPasswordController::class,
        'reset'
    ])->name('password.reset.update');
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

        // PROFIL ADMIN
        Route::get('/profile', [
            ProfileController::class,
            'adminProfile'
        ])->name('profile');

        // HALAMAN GANTI PASSWORD ADMIN
        Route::get('/change-password', [
            ProfileController::class,
            'adminPassword'
        ])->name('password');

        // PROSES GANTI PASSWORD ADMIN
        Route::put('/change-password', [
            ProfileController::class,
            'updateAdminPassword'
        ])->name('password.update');

        // USER MANAGEMENT
        Route::get('/users', [
            UserManagementController::class,
            'index'
        ])->name('users.index');

        // TAMBAH USER
        Route::get('/users/create', [
            UserManagementController::class,
            'create'
        ])->name('users.create');

        Route::post('/users', [
            UserManagementController::class,
            'store'
        ])->name('users.store');

        Route::patch('/users/{user}/status', [
            UserManagementController::class,
            'updateStatus'
        ])->name('users.update-status');

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

// PROSES PENYIMPANAN LAMARAN
Route::middleware(['auth', 'single.device', 'role:pelamar'])->group(function () {

    Route::post('/lamaran/kirim', [
        JobApplicationController::class,
        'store'
    ])->name('applications.store');

});

// Halaman informasi verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Proses verifikasi email
Route::get('/email/verify/{id}/{hash}', function (
    EmailVerificationRequest $request
) {
    $request->fulfill();

    return redirect()->route('home')
        ->with('success', 'Email berhasil diverifikasi! Silakan login.');
})->middleware(['auth', 'signed', 'throttle:6,1'])
  ->name('verification.verify');

// Kirim ulang email verifikasi
Route::post('/email/verification-notification', function (
    Request $request
) {
    if ($request->user()->hasVerifiedEmail()) {
        return back()->with('success', 'Email sudah terverifikasi.');
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with(
        'success',
        'Tautan verifikasi berhasil dikirim ulang.'
    );
})->middleware(['auth', 'throttle:6,1'])
  ->name('verification.send');
