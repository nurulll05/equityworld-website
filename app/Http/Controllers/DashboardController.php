<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('dashboards.placeholder', [
            'dashboardTitle' => 'Dashboard HRD',
            'dashboardDescription' => 'Halaman pengelolaan rekrutmen Equityworld Futures.'
        ]);
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