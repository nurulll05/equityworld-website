<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // ==========================================
    // 1. DASHBOARD ADMIN
    // ==========================================

    public function admin()
    {
        return view('dashboards.placeholder', [
            'dashboardTitle' => 'Dashboard Admin',
            'dashboardDescription' => 'Halaman administrasi Equityworld Futures.'
        ]);
    }


    // ==========================================
    // 2. DASHBOARD HRD
    // ==========================================

    public function hrd()
    {
        // Mengambil data HRD yang sedang login
        $user = Auth::user();

        // Menampilkan halaman Dashboard HRD
        // Data lamaran dibaca melalui file:
        // resources/views/hrd/dashboard.blade.php

        return view('hrd.dashboard', compact('user'));
    }


    // ==========================================
    // 3. DASHBOARD PELAMAR
    // ==========================================

    public function pelamar()
    {
        $user = Auth::user();

        return view('dashboards.pelamar', compact('user'));
    }
}