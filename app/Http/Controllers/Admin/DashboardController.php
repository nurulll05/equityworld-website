<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now();

        // Pilihan periode grafik
        $selectedPeriod = request('period', '6');

        if (!in_array($selectedPeriod, ['3', '6', 'year'])) {
            $selectedPeriod = '6';
        }

        // Nilai awal statistik
        $statistics = [
            'total_users' => 0,
            'today_users' => 0,
            'monthly_users' => 0,
            'admin_users' => 0,
            'hrd_users' => 0,
            'applicant_users' => 0,
            'database_status' => 'Disconnected',
        ];

        $monthlyRegistrations = collect();
        $latestUsers = collect();

        try {
            // Periksa koneksi database
            DB::connection()->getPdo();

            $statistics['database_status'] = 'Connected';

            // Statistik seluruh pengguna
            $statistics['total_users'] = User::count();

            // Registrasi hari ini
            $statistics['today_users'] = User::whereDate(
                'created_at',
                $today->toDateString()
            )->count();

            // Registrasi bulan ini
            $statistics['monthly_users'] = User::whereYear(
                'created_at',
                $today->year
            )->whereMonth(
                'created_at',
                $today->month
            )->count();

            // Statistik berdasarkan role
            $statistics['admin_users'] = User::where(
                'role',
                'admin'
            )->count();

            $statistics['hrd_users'] = User::where(
                'role',
                'hrd'
            )->count();

            $statistics['applicant_users'] = User::where(
                'role',
                'pelamar'
            )->count();

            // Tentukan awal periode grafik
            $startMonth = $today->copy()->startOfMonth();

            if ($selectedPeriod === '3') {
                $startMonth->subMonths(2);
            } elseif ($selectedPeriod === '6') {
                $startMonth->subMonths(5);
            } else {
                $startMonth->startOfYear();
            }

            // Grafik registrasi berdasarkan periode
            while ($startMonth <= $today) {
                $month = $startMonth->copy();

                $total = User::whereYear(
                    'created_at',
                    $month->year
                )->whereMonth(
                    'created_at',
                    $month->month
                )->count();

                $monthlyRegistrations->push([
                    'name' => $month->translatedFormat('M'),
                    'total' => $total,
                ]);

                $startMonth->addMonth();
            }

            // Lima pengguna terbaru
            $latestUsers = User::latest()
                ->take(5)
                ->get();

        } catch (Throwable $e) {
            $statistics['database_status'] = 'Disconnected';
        }

        return view('admin.dashboard', compact(
            'statistics',
            'monthlyRegistrations',
            'latestUsers',
            'selectedPeriod'
        ));
    }
}