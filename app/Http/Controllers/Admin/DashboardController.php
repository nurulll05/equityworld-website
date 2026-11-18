<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'total_users' => 68,
            'total_news' => 42,
            'total_applicants' => 318,
            'security_status' => 'A+ Aman',
            'total_sessions' => 482,
            'database_status' => 'Connected',
        ];

        return view('admin.dashboard', compact('statistics'));
    }
}