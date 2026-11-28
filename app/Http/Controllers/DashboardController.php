<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    // 1. DASHBOARD ADMIN
    public function admin()
    {
        return view('dashboards.placeholder', [
            'dashboardTitle' => 'Dashboard Admin',
            'dashboardDescription' => 'Halaman administrasi Equityworld Futures.'
        ]);
    }

    // 2. DASHBOARD HRD
    public function hrd()
    {
        $user = Auth::user();

        return view('hrd.dashboard', compact('user'));
    }

    // 3. DASHBOARD PELAMAR
    public function pelamar()
    {
        $user = Auth::user();

        // Mengambil data lamaran milik pelamar yang sedang login
        $application = JobApplication::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('dashboards.pelamar', compact('user', 'application'));
    }
}