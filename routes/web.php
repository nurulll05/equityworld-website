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
use App\Http\Controllers\Admin\RoleManagementController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\ApplicantManagementController;

// HALAMAN UTAMA
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// HALAMAN PUBLIK
Route::view('/tentang-kami', 'pages.tentang-kami')
    ->name('about');

Route::view('/legalitas', 'pages.legalitas')
    ->name('legality');

Route::get('/karier', function () {
    $activeApplication = null;

    if (auth()->check() && auth()->user()->role === 'pelamar') {
        $activeApplication = \App\Models\JobApplication::where('user_id', auth()->id())
            ->whereNotIn('status', ['ditolak', 'dibatalkan'])
            ->latest()
            ->first();
    }

    return view('pages.karier', compact('activeApplication'));
})->name('careers');

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

        // DASHBOARD
        Route::get('/dashboard', [
            AdminDashboardController::class,
            'index'
        ])->middleware('permission:dashboard.view')
          ->name('dashboard');

        // PROFIL ADMIN
        Route::get('/profile', [
            ProfileController::class,
            'adminProfile'
        ])->middleware('permission:profile.manage')
          ->name('profile');

        // HALAMAN GANTI PASSWORD ADMIN
        Route::get('/change-password', [
            ProfileController::class,
            'adminPassword'
        ])->middleware('permission:profile.manage')
          ->name('password');

        // PROSES GANTI PASSWORD ADMIN
        Route::put('/change-password', [
            ProfileController::class,
            'updateAdminPassword'
        ])->middleware('permission:profile.manage')
          ->name('password.update');

        // USER MANAGEMENT
        Route::get('/users', [
            UserManagementController::class,
            'index'
        ])->middleware('permission:users.view')
          ->name('users.index');

        // TAMBAH USER
        Route::get('/users/create', [
            UserManagementController::class,
            'create'
        ])->middleware('permission:users.create')
          ->name('users.create');

        Route::post('/users', [
            UserManagementController::class,
            'store'
        ])->middleware('permission:users.create')
          ->name('users.store');

        // UBAH STATUS USER
        Route::patch('/users/{user}/status', [
            UserManagementController::class,
            'updateStatus'
        ])->middleware('permission:users.update-status')
          ->name('users.update-status');

        // DATA PELAMAR
        Route::get('/applicants', [
            ApplicantManagementController::class,
            'index'
        ])->middleware('permission:applications.view')
        ->name('applicants.index');

        // DETAIL PELAMAR (UNTUK MODAL)
        Route::get('/applicants/{id}', [
            ApplicantManagementController::class,
            'show'
        ])->middleware('permission:applications.view')
        ->name('applicants.show');

        // PRATINJAU DOKUMEN PELAMAR
        Route::get('/applicants/{id}/documents/{document}', [
            ApplicantManagementController::class,
            'viewDocument'
        ])->middleware('permission:applications.view')
        ->name('applicants.documents.view');

        // ROLE MANAGEMENT (RBAC)
        Route::prefix('roles')
            ->name('roles.')
            ->middleware('permission:roles.view')
            ->group(function () {

                // DAFTAR ROLE
                Route::get('/', [
                    RoleManagementController::class,
                    'index'
                ])->name('index');

                // FORM TAMBAH ROLE
                Route::get('/create', [
                    RoleManagementController::class,
                    'create'
                ])->middleware('permission:roles.manage')
                  ->name('create');

                // SIMPAN ROLE
                Route::post('/', [
                    RoleManagementController::class,
                    'store'
                ])->middleware('permission:roles.manage')
                  ->name('store');

                // FORM EDIT ROLE
                Route::get('/{role}/edit', [
                    RoleManagementController::class,
                    'edit'
                ])->middleware('permission:roles.manage')
                  ->name('edit');

                // UPDATE ROLE
                Route::put('/{role}', [
                    RoleManagementController::class,
                    'update'
                ])->middleware('permission:roles.manage')
                  ->name('update');

            });

        // WEBSITE MANAGEMENT / CMS
        Route::prefix('website')
            ->name('website.')
            ->middleware('permission:website.manage')
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
Route::middleware(['auth', 'single.device', 'role:pelamar'])

    ->group(function () {

        // FORM STAFF
        Route::get('/form-staff', function () {
            $hasActiveApplication = \App\Models\JobApplication::where('user_id', auth()->id())
                ->whereNotIn('status', ['ditolak', 'dibatalkan'])
                ->exists();

            if ($hasActiveApplication) {
                return redirect()
                    ->route('pelamar.dashboard', ['tab' => 'lamaran'])
                    ->with('info', 'Anda sudah memiliki lamaran aktif.');
            }

            return view('pages.form-staff');
        })->name('form.staff');

        // FORM MAGANG
        Route::get('/form-magang', function () {
            $hasActiveApplication = \App\Models\JobApplication::where('user_id', auth()->id())
                ->whereNotIn('status', ['ditolak', 'dibatalkan'])
                ->exists();

            if ($hasActiveApplication) {
                return redirect()
                    ->route('pelamar.dashboard', ['tab' => 'lamaran'])
                    ->with('info', 'Anda sudah memiliki lamaran aktif.');
            }

            return view('pages.form-magang');
        })->name('form.magang');

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
