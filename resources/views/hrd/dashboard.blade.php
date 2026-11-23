
@php
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD HRD - EQUITYWORLD FUTURES
    |--------------------------------------------------------------------------
    | Semua tampilan, komponen, CSS, dan JavaScript berada dalam satu file.
    | Data statistik dan aktivitas dibaca dari database.
    */

    $user = $user ?? auth()->user();
    $displayName = $user->name ?? 'HRD';
    $avatar = strtoupper(substr($displayName, 0, 1));

    $schema = \Illuminate\Support\Facades\Schema::class;
    $db = \Illuminate\Support\Facades\DB::class;
    $carbon = \Illuminate\Support\Carbon::class;

    // Helper untuk mendeteksi nama kolom yang tersedia.
    $firstColumn = function ($candidates, $columns) {
        foreach ($candidates as $candidate) {
            if (in_array($candidate, $columns, true)) {
                return $candidate;
            }
        }

        return null;
    };

    // =====================================================
    // 1. DATA LAMARAN
    // =====================================================

    $hasApplications = $schema::hasTable('job_applications');

    $applicationColumns = $hasApplications
        ? $schema::getColumnListing('job_applications')
        : [];

    $dateColumn = $firstColumn([
        'created_at',
        'applied_at',
        'application_date',
        'tanggal_lamaran'
    ], $applicationColumns);

    $statusColumn = $firstColumn([
        'status',
        'application_status',
        'status_lamaran',
        'tahap_seleksi',
        'selection_status'
    ], $applicationColumns);

    $nameColumn = $firstColumn([
        'applicant_name',
        'candidate_name',
        'full_name',
        'nama_lengkap',
        'nama_pelamar',
        'name',
        'nama'
    ], $applicationColumns);

    $positionColumn = $firstColumn([
        'position',
        'job_title',
        'applied_position',
        'posisi',
        'lowongan',
        'vacancy_name'
    ], $applicationColumns);

    $emailColumn = $firstColumn([
        'email',
        'applicant_email',
        'email_pelamar'
    ], $applicationColumns);

    $userIdColumn = $firstColumn([
        'user_id',
        'applicant_id'
    ], $applicationColumns);

    $totalApplications = $hasApplications
        ? $db::table('job_applications')->count()
        : null;

    $todayApplications = (
        $hasApplications && $dateColumn
    )
        ? $db::table('job_applications')
            ->whereDate($dateColumn, $carbon::today())
            ->count()
        : null;

    // =====================================================
    // 2. STATUS PELAMAR LOLOS
    // =====================================================

    $passedStatuses = [
        'lolos',
        'lulus',
        'diterima',
        'accepted',
        'passed',
        'qualified'
    ];

    $passedApplications = null;

    if ($hasApplications && $statusColumn) {
        $passedApplications = $db::table('job_applications')
            ->get([$statusColumn])
            ->filter(function ($item) use (
                $statusColumn,
                $passedStatuses
            ) {
                return in_array(
                    strtolower(trim((string) $item->{$statusColumn})),
                    $passedStatuses,
                    true
                );
            })
            ->count();
    }

    // Helper label status.
    $getStatus = function ($value) {
        $value = strtolower(trim((string) $value));

        if (in_array($value, [
            'lolos', 'lulus', 'diterima',
            'accepted', 'passed', 'qualified'
        ], true)) {
            return [
                'label' => 'Lolos',
                'class' => 'success'
            ];
        }

        if (in_array($value, [
            'ditolak', 'rejected', 'gagal', 'failed'
        ], true)) {
            return [
                'label' => 'Tidak Lolos',
                'class' => 'danger'
            ];
        }

        if (in_array($value, [
            'interview', 'wawancara'
        ], true)) {
            return [
                'label' => 'Wawancara',
                'class' => 'info'
            ];
        }

        if (in_array($value, [
            'pending', 'menunggu', 'submitted'
        ], true)) {
            return [
                'label' => 'Menunggu',
                'class' => 'warning'
            ];
        }

        if (in_array($value, [
            'diproses', 'proses', 'review', 'screening'
        ], true)) {
            return [
                'label' => 'Diproses',
                'class' => 'info'
            ];
        }

        return [
            'label' => $value
                ? ucwords(str_replace('_', ' ', $value))
                : 'Belum ditinjau',
            'class' => 'neutral'
        ];
    };

    // =====================================================
    // 3. DATA LOWONGAN
    // =====================================================

    $vacancyTable = null;

    foreach ([
        'job_vacancies',
        'vacancies',
        'jobs',
        'lowongan_kerja',
        'lowongans',
        'job_positions'
    ] as $table) {
        if ($schema::hasTable($table)) {
            $vacancyTable = $table;
            break;
        }
    }

    $activeVacancies = null;
    $vacancyDescription = 'Tabel lowongan belum tersedia';

    if ($vacancyTable) {
        $vacancyColumns = $schema::getColumnListing($vacancyTable);

        $activeColumn = $firstColumn([
            'is_active',
            'active'
        ], $vacancyColumns);

        $vacancyStatusColumn = $firstColumn([
            'status'
        ], $vacancyColumns);

        if ($activeColumn) {
            $activeVacancies = $db::table($vacancyTable)
                ->where($activeColumn, 1)
                ->count();

            $vacancyDescription = 'Lowongan aktif';
        } elseif ($vacancyStatusColumn) {
            $activeVacancies = $db::table($vacancyTable)
                ->whereIn($vacancyStatusColumn, [
                    'active',
                    'aktif',
                    'published',
                    'open',
                    'dibuka'
                ])
                ->count();

            $vacancyDescription = 'Lowongan aktif';
        } else {
            $activeVacancies = $db::table($vacancyTable)->count();
            $vacancyDescription = 'Total lowongan terdata';
        }
    }

    // =====================================================
    // 4. GRAFIK PENDAFTARAN ENAM BULAN TERAKHIR
    // =====================================================

    $chartMonths = [];

    $chartStart = $carbon::now()
        ->startOfMonth()
        ->subMonths(5);

    for ($i = 0; $i < 6; $i++) {
        $month = $chartStart->copy()->addMonths($i);
        $key = $month->format('Y-m');

        $chartMonths[$key] = [
            'label' => $month->format('M'),
            'total' => 0,
            'passed' => 0
        ];
    }

    if ($hasApplications && $dateColumn) {
        $chartSelect = array_values(array_unique(array_filter([
            $dateColumn,
            $statusColumn
        ])));

        $chartRows = $db::table('job_applications')
            ->where($dateColumn, '>=', $chartStart)
            ->get($chartSelect);

        foreach ($chartRows as $row) {
            if (!$row->{$dateColumn}) {
                continue;
            }

            try {
                $date = $carbon::parse($row->{$dateColumn});
                $key = $date->format('Y-m');

                if (isset($chartMonths[$key])) {
                    $chartMonths[$key]['total']++;

                    if (
                        $statusColumn &&
                        in_array(
                            strtolower(trim((string) $row->{$statusColumn})),
                            $passedStatuses,
                            true
                        )
                    ) {
                        $chartMonths[$key]['passed']++;
                    }
                }
            } catch (\Throwable $e) {
                continue;
            }
        }
    }

    $chartMax = max(
        1,
        max(array_column($chartMonths, 'total'))
    );

    // =====================================================
    // 5. AKTIVITAS PELAMAR TERBARU
    // =====================================================

    $applicantRows = [];

    if ($hasApplications) {
        $query = $db::table('job_applications');

        if ($dateColumn) {
            $query->orderBy($dateColumn, 'desc');
        } elseif (in_array('id', $applicationColumns, true)) {
            $query->orderBy('id', 'desc');
        }

        $recentApplications = $query->limit(8)->get();

        foreach ($recentApplications as $index => $row) {
            $candidateName = $nameColumn
                ? ($row->{$nameColumn} ?? null)
                : null;

            // Jika nama tidak ada di tabel lamaran,
            // coba ambil dari relasi users.
            if (
                !$candidateName &&
                $userIdColumn &&
                $schema::hasTable('users') &&
                $schema::hasColumn('users', 'name')
            ) {
                $candidateName = $db::table('users')
                    ->where('id', $row->{$userIdColumn})
                    ->value('name');
            }

            $candidateName = $candidateName
                ?: 'Pelamar #' . ($row->id ?? ($index + 1));

            $position = $positionColumn
                ? ($row->{$positionColumn} ?? 'Belum ditentukan')
                : 'Belum ditentukan';

            $email = $emailColumn
                ? ($row->{$emailColumn} ?? '-')
                : '-';

            $rawStatus = $statusColumn
                ? ($row->{$statusColumn} ?? '')
                : '';

            $status = $getStatus($rawStatus);

            $rawDate = $dateColumn
                ? ($row->{$dateColumn} ?? null)
                : null;

            try {
                $formattedDate = $rawDate
                    ? $carbon::parse($rawDate)->format('d M Y')
                    : '-';
            } catch (\Throwable $e) {
                $formattedDate = '-';
            }

            $applicantRows[] = [
                'name' => $candidateName,
                'position' => $position,
                'email' => $email,
                'status' => $status,
                'date' => $formattedDate
            ];
        }
    }

    $today = $carbon::now()->format('d M Y');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard HRD | Equityworld Futures</title>

    <style>
        :root {
            --navy: #102b50;
            --navy-dark: #0b203c;
            --navy-light: #183b68;
            --orange: #f7941d;
            --orange-light: #fff1df;
            --bg: #f5f7fb;
            --white: #ffffff;
            --text: #172b45;
            --muted: #8793a5;
            --border: #e8edf4;
            --green: #16865b;
            --red: #c84c4c;
            --blue: #3975c6;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input {
            font: inherit;
        }

        .app-shell {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 245px;
            min-width: 245px;
            min-height: 100vh;
            background: var(--navy-dark);
            color: #dce6f4;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
        }

        .brand {
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 21px;
            gap: 11px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .brand-logo {
            width: 37px;
            height: 37px;
            background: var(--orange);
            border-radius: 9px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 17px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 800;
            color: white;
        }

        .brand-sub {
            font-size: 9px;
            color: #aabbd0;
            margin-top: 4px;
        }

        .sidebar-content {
            padding: 19px 12px;
            flex: 1;
            overflow-y: auto;
        }

        .menu-heading {
            color: #8296b2;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 15px 11px 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 12px;
            border-radius: 7px;
            color: #c2d0e2;
            font-size: 11px;
            margin-bottom: 4px;
            transition: .2s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,.08);
            color: white;
        }

        .nav-link.active {
            background: var(--orange);
            color: white;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(247,148,29,.2);
        }

        .nav-icon {
            width: 17px;
            text-align: center;
            font-size: 15px;
        }

        .nav-badge {
            margin-left: auto;
            background: rgba(247,148,29,.2);
            color: #ffc77d;
            border-radius: 5px;
            padding: 3px 6px;
            font-size: 9px;
        }

        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid rgba(255,255,255,.09);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 14px;
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--orange);
            color: white;
            display: grid;
            place-items: center;
            font-weight: 800;
        }

        .sidebar-user-name {
            font-size: 11px;
            color: white;
            font-weight: 700;
        }

        .sidebar-user-role {
            color: #91a5bf;
            font-size: 9px;
            margin-top: 3px;
        }

        .logout-button {
            border: 0;
            background: transparent;
            color: #f5b5b5;
            cursor: pointer;
            width: 100%;
            text-align: left;
            padding: 9px;
            border-radius: 6px;
            font-size: 11px;
        }

        .logout-button:hover {
            background: rgba(255,255,255,.08);
        }

        /* MAIN */

        .main {
            flex: 1;
            min-width: 0;
            margin-left: 245px;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 29px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 11px;
        }

        .breadcrumb strong {
            color: var(--navy);
        }

        .search-box {
            width: 235px;
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: 9px 12px;
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .search-box input {
            border: 0;
            outline: none;
            width: 100%;
            font-size: 11px;
            color: var(--text);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 13px;
            border-radius: 7px;
            border: 1px solid var(--border);
            background: white;
            color: var(--navy);
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .button:hover {
            background: #f7f9fc;
        }

        .button-orange {
            background: var(--orange);
            border-color: var(--orange);
            color: white;
        }

        .button-orange:hover {
            background: #e7830b;
            color: white;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-left: 9px;
            padding-left: 15px;
            border-left: 1px solid var(--border);
        }

        .profile-avatar {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            color: white;
            background: var(--navy);
            font-weight: 800;
        }

        .profile-name {
            font-size: 10px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 9px;
            color: var(--muted);
            margin-top: 3px;
        }

        .mobile-toggle {
            display: none;
            border: 0;
            background: none;
            font-size: 23px;
            color: var(--navy);
            cursor: pointer;
        }

        /* PAGE CONTENT */

        .page-content {
            max-width: 1600px;
            margin: auto;
            padding: 25px 29px 35px;
        }

        .welcome {
            min-height: 130px;
            border-radius: 11px;
            padding: 26px 28px;
            background: linear-gradient(115deg, #102b50, #183c68);
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 23px;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border: 1px solid rgba(255,255,255,.09);
            border-radius: 50%;
            right: 40px;
            top: -115px;
        }

        .welcome::before {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 50%;
            right: 10px;
            bottom: -105px;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-label {
            color: #ffbd70;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .welcome h1 {
            font-size: 24px;
            margin-bottom: 9px;
            font-weight: 800;
        }

        .welcome p {
            color: #d0dced;
            font-size: 11px;
            line-height: 1.8;
            max-width: 610px;
        }

        .welcome-date {
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 10px;
            color: white;
            position: relative;
            z-index: 1;
        }

        /* STATISTICS */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 13px;
        }

        .section-title {
            color: var(--navy);
            font-size: 13px;
            font-weight: 800;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 23px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 17px;
            min-width: 0;
            box-shadow: 0 3px 12px rgba(16,43,80,.025);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 35px;
            height: 35px;
            border-radius: 9px;
            display: grid;
            place-items: center;
            font-size: 16px;
        }

        .icon-orange {
            color: #e88918;
            background: #fff0dc;
        }

        .icon-blue {
            color: #3975c6;
            background: #eaf2ff;
        }

        .icon-green {
            color: #16865b;
            background: #e5f6ee;
        }

        .icon-purple {
            color: #7957bd;
            background: #f0eaff;
        }

        .stat-label {
            color: #78879a;
            font-size: 10px;
            font-weight: 600;
        }

        .stat-number {
            color: var(--navy);
            font-size: 27px;
            font-weight: 800;
            margin: 7px 0;
        }

        .stat-description {
            color: #9aa4b2;
            font-size: 9px;
        }

        /* CONTENT GRID */

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(260px, 1fr);
            gap: 17px;
            margin-bottom: 21px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 19px;
            min-width: 0;
            box-shadow: 0 3px 12px rgba(16,43,80,.025);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 19px;
        }

        .card-title {
            color: var(--navy);
            font-size: 12px;
            font-weight: 800;
        }

        .card-description {
            color: var(--muted);
            font-size: 9px;
            margin-top: 5px;
        }

        .period-label {
            font-size: 9px;
            color: #e88918;
            font-weight: 700;
        }

        /* CHART */

        .chart-legend {
            display: flex;
            gap: 17px;
            margin-bottom: 17px;
            font-size: 9px;
            color: #7f8da0;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 2px;
        }

        .chart-area {
            height: 205px;
            display: flex;
            align-items: flex-end;
            gap: 8px;
            position: relative;
            padding: 0 8px 27px;
            border-bottom: 1px solid var(--border);
            background: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 49px,
                #edf1f6 50px
            );
        }

        .month-column {
            flex: 1;
            min-width: 0;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            position: relative;
        }

        .bar-pair {
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: 5px;
        }

        .bar {
            width: 15px;
            max-width: 34%;
            min-height: 0;
            border-radius: 4px 4px 0 0;
            transition: height .3s;
        }

        .bar-total {
            background: var(--orange);
        }

        .bar-passed {
            background: var(--navy);
        }

        .month-label {
            position: absolute;
            bottom: -20px;
            font-size: 9px;
            color: #8290a3;
        }

        .chart-note {
            font-size: 9px;
            color: #98a4b3;
            margin-top: 20px;
        }

        /* AGENDA */

        .agenda-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .agenda-item {
            display: flex;
            gap: 10px;
            padding: 11px;
            background: #f8f9fc;
            border: 1px solid #edf0f5;
            border-radius: 8px;
        }

        .agenda-date {
            min-width: 42px;
            height: 45px;
            background: var(--orange-light);
            color: #d77c0e;
            border-radius: 7px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .agenda-date strong {
            font-size: 15px;
        }

        .agenda-date span {
            font-size: 8px;
        }

        .agenda-info {
            min-width: 0;
            flex: 1;
        }

        .agenda-info strong {
            display: block;
            font-size: 10px;
            color: var(--navy);
            margin-bottom: 5px;
        }

        .agenda-info p {
            color: #8c99a9;
            font-size: 9px;
            line-height: 1.5;
        }

        .agenda-empty {
            text-align: center;
            padding: 32px 12px;
            background: #f8f9fc;
            border: 1px dashed #dce3ed;
            border-radius: 8px;
        }

        .agenda-empty .empty-icon {
            font-size: 26px;
            margin-bottom: 9px;
        }

        .agenda-empty strong {
            display: block;
            color: var(--navy);
            font-size: 11px;
            margin-bottom: 6px;
        }

        .agenda-empty p {
            color: var(--muted);
            font-size: 9px;
            line-height: 1.6;
        }

        /* APPLICANT TABLE */

        .table-card {
            margin-bottom: 22px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .applicant-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 680px;
        }

        .applicant-table th {
            text-align: left;
            padding: 12px 10px;
            color: #8592a5;
            background: #f7f9fc;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
            border-bottom: 1px solid var(--border);
        }

        .applicant-table td {
            padding: 13px 10px;
            border-bottom: 1px solid #edf0f5;
            font-size: 10px;
            color: #53657b;
        }

        .applicant-table tr:last-child td {
            border-bottom: 0;
        }

        .applicant-name {
            color: var(--navy);
            font-weight: 700;
        }

        .applicant-email {
            display: block;
            color: #9aa5b3;
            font-size: 9px;
            margin-top: 4px;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status.success {
            background: #e4f5eb;
            color: #16865b;
        }

        .status.warning {
            background: #fff1dc;
            color: #c47b16;
        }

        .status.danger {
            background: #fde9e9;
            color: #c84c4c;
        }

        .status.info {
            background: #e8f0ff;
            color: #3975c6;
        }

        .status.neutral {
            background: #edf0f5;
            color: #748195;
        }

        .empty-table {
            padding: 35px 15px !important;
            text-align: center;
            color: #8b98a9 !important;
            line-height: 1.7;
        }

        .table-footer {
            padding-top: 13px;
            margin-top: 5px;
            border-top: 1px solid var(--border);
            font-size: 9px;
            color: #98a4b3;
        }

        /* FOOTER */

        .footer {
            background: #eaf1ff;
            border-radius: 8px;
            padding: 13px 16px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #627895;
            font-size: 9px;
            line-height: 1.6;
        }

        .footer strong {
            color: var(--navy);
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s;
            }

            .app-shell.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .topbar {
                padding: 0 14px;
                height: 62px;
            }

            .search-box {
                width: 155px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .topbar-actions .button-outline {
                display: none;
            }

            .page-content {
                padding: 17px 13px 25px;
            }

            .welcome {
                padding: 21px;
                min-height: 145px;
            }

            .welcome h1 {
                font-size: 19px;
            }

            .welcome-date {
                display: none;
            }

            .stats-grid {
                gap: 9px;
            }

            .stat-card {
                padding: 13px;
            }

            .stat-number {
                font-size: 23px;
            }

            .footer {
                flex-direction: column;
            }
        }

        @media (max-width: 400px) {
            .search-box {
                width: 125px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-label {
                font-size: 9px;
            }
        }
    </style>
</head>

<body>

<div class="app-shell" id="appShell">

    <!-- =================================================
         SIDEBAR
    ================================================== -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-logo">EW</div>

            <div>
                <div class="brand-name">PT. Equityworld Futures</div>
                <div class="brand-sub">HRD & Recruitment Portal</div>
            </div>
        </div>

        <div class="sidebar-content">

            <div class="menu-heading">MENU UTAMA</div>

            <a href="{{ route('hrd.dashboard') }}"
               class="nav-link active">
                <span class="nav-icon">⌂</span>
                Beranda HRD
            </a>

            <div class="menu-heading">MANAJEMEN REKRUTMEN</div>

            <a href="#aktivitas" class="nav-link">
                <span class="nav-icon">♙</span>
                Data Pelamar
                <span class="nav-badge">
                    {{ $totalApplications ?? '—' }}
                </span>
            </a>

            <a href="#lowongan" class="nav-link">
                <span class="nav-icon">▣</span>
                Lowongan Kerja
            </a>

            <a href="#ringkasan" class="nav-link">
                <span class="nav-icon">▤</span>
                Formulir Magang
            </a>

            <div class="menu-heading">PROSES SELEKSI</div>

            <a href="#agenda" class="nav-link">
                <span class="nav-icon">▦</span>
                Jadwal Seleksi
            </a>

            <a href="#aktivitas" class="nav-link">
                <span class="nav-icon">✓</span>
                Hasil Seleksi
            </a>

            <div class="menu-heading">PELAPORAN & ANALITIK</div>

            <a href="#grafik" class="nav-link">
                <span class="nav-icon">▥</span>
                Laporan Rekrutmen
            </a>

        </div>

        <div class="sidebar-footer">

            <div class="sidebar-user">
                <div class="avatar">{{ $avatar }}</div>

                <div>
                    <div class="sidebar-user-name">
                        {{ $displayName }}
                    </div>

                    <div class="sidebar-user-role">
                        Human Resource Department
                    </div>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    ↪ &nbsp; Keluar dari Dashboard
                </button>
            </form>

        </div>

    </aside>


    <!-- =================================================
         MAIN CONTENT
    ================================================== -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-left">

                <button class="mobile-toggle"
                        type="button"
                        onclick="toggleSidebar()">
                    ☰
                </button>

                <div class="breadcrumb">
                    Portal HRD &nbsp;/&nbsp;
                    <strong>Dashboard</strong>
                </div>

                <div class="search-box">
                    <span>⌕</span>

                    <input
                        type="text"
                        id="applicantSearch"
                        placeholder="Cari nama pelamar..."
                    >
                </div>

            </div>

            <div class="topbar-actions">

                <a href="#agenda" class="button button-outline">
                    ▦ &nbsp; Agenda Seleksi
                </a>

                <button type="button"
                        class="button button-orange"
                        onclick="exportApplicantTable()">
                    ↓ &nbsp; Ekspor Laporan
                </button>

                <div class="profile">

                    <div class="profile-avatar">
                        {{ $avatar }}
                    </div>

                    <div>
                        <div class="profile-name">
                            {{ $displayName }}
                        </div>

                        <div class="profile-role">
                            Human Resources
                        </div>
                    </div>

                </div>

            </div>

        </header>


        <div class="page-content">

            <!-- =================================================
                 WELCOME BANNER
            ================================================== -->

            <section class="welcome" id="top">

                <div class="welcome-content">

                    <div class="welcome-label">
                        Human Resource & Recruitment Management
                    </div>

                    <h1>
                        Selamat Datang, {{ $displayName }}.
                    </h1>

                    <p>
                        Selamat bekerja di Portal Human Resources
                        Equityworld Futures. Kelola proses rekrutmen,
                        pantau perkembangan pelamar, dan koordinasikan
                        kegiatan seleksi secara terstruktur dalam satu
                        dashboard.
                    </p>

                </div>

                <div class="welcome-date">
                    📅 &nbsp; {{ $today }}
                </div>

            </section>


            <!-- =================================================
                 STATISTICS
            ================================================== -->

            <section id="ringkasan">

                <div class="section-heading">
                    <div>
                        <div class="section-title">
                            Ringkasan Rekrutmen
                        </div>

                        <div class="section-subtitle">
                            Informasi aktivitas rekrutmen perusahaan
                        </div>
                    </div>
                </div>

                <div class="stats-grid">

                    <!-- LOWONGAN -->

                    <article class="stat-card" id="lowongan">

                        <div class="stat-top">
                            <span class="stat-label">
                                {{ $vacancyTable ? 'Lowongan Aktif' : 'Lowongan Kerja' }}
                            </span>

                            <div class="stat-icon icon-orange">
                                ▣
                            </div>
                        </div>

                        <div class="stat-number">
                            {{ $activeVacancies !== null ? number_format($activeVacancies, 0, ',', '.') : '—' }}
                        </div>

                        <div class="stat-description">
                            {{ $vacancyDescription }}
                        </div>

                    </article>


                    <!-- PENDAFTARAN HARI INI -->

                    <article class="stat-card">

                        <div class="stat-top">
                            <span class="stat-label">
                                Pendaftar Hari Ini
                            </span>

                            <div class="stat-icon icon-blue">
                                ♙
                            </div>
                        </div>

                        <div class="stat-number">
                            {{ $todayApplications !== null ? number_format($todayApplications, 0, ',', '.') : '—' }}
                        </div>

                        <div class="stat-description">
                            Pendaftaran berdasarkan tanggal sistem
                        </div>

                    </article>


                    <!-- TOTAL PENDAFTAR -->

                    <article class="stat-card">

                        <div class="stat-top">
                            <span class="stat-label">
                                Total Pendaftar
                            </span>

                            <div class="stat-icon icon-purple">
                                ▤
                            </div>
                        </div>

                        <div class="stat-number">
                            {{ $totalApplications !== null ? number_format($totalApplications, 0, ',', '.') : '—' }}
                        </div>

                        <div class="stat-description">
                            Seluruh data lamaran yang tercatat
                        </div>

                    </article>


                    <!-- LOLOS SELEKSI -->

                    <article class="stat-card">

                        <div class="stat-top">
                            <span class="stat-label">
                                Pelamar Lolos Seleksi
                            </span>

                            <div class="stat-icon icon-green">
                                ✓
                            </div>
                        </div>

                        <div class="stat-number">
                            {{ $passedApplications !== null ? number_format($passedApplications, 0, ',', '.') : '—' }}
                        </div>

                        <div class="stat-description">
                            Berdasarkan status pada data lamaran
                        </div>

                    </article>

                </div>

            </section>


            <!-- =================================================
                 CHART + AGENDA
            ================================================== -->

            <section class="content-grid">

                <!-- CHART -->

                <article class="card" id="grafik">

                    <div class="card-header">

                        <div>
                            <div class="card-title">
                                Tren Pendaftaran Pelamar
                            </div>

                            <div class="card-description">
                                Perkembangan pendaftaran enam bulan terakhir
                            </div>
                        </div>

                        <span class="period-label">
                            6 BULAN TERAKHIR
                        </span>

                    </div>

                    <div class="chart-legend">

                        <div class="legend-item">
                            <span class="legend-dot"
                                  style="background:#f7941d"></span>
                            Total Pendaftar
                        </div>

                        <div class="legend-item">
                            <span class="legend-dot"
                                  style="background:#102b50"></span>
                            Pelamar Lolos
                        </div>

                    </div>

                    <div class="chart-area">

                        @foreach($chartMonths as $month)

                            <div class="month-column">

                                <div class="bar-pair">

                                    <div
                                        class="bar bar-total"
                                        title="Total: {{ $month['total'] }}"
                                        style="height: {{ $month['total'] > 0 ? max(5, ($month['total'] / $chartMax) * 100) : 0 }}%"
                                    ></div>

                                    <div
                                        class="bar bar-passed"
                                        title="Lolos: {{ $month['passed'] }}"
                                        style="height: {{ $month['passed'] > 0 ? max(5, ($month['passed'] / $chartMax) * 100) : 0 }}%"
                                    ></div>

                                </div>

                                <span class="month-label">
                                    {{ $month['label'] }}
                                </span>

                            </div>

                        @endforeach

                    </div>

                    <div class="chart-note">
                        Sumber data: tabel job_applications.
                        Grafik diperbarui berdasarkan data pendaftaran.
                    </div>

                </article>


                <!-- AGENDA -->

                <article class="card" id="agenda">

                    <div class="card-header">

                        <div>
                            <div class="card-title">
                                Agenda Seleksi
                            </div>

                            <div class="card-description">
                                Jadwal kegiatan rekrutmen HRD
                            </div>
                        </div>

                        <span class="period-label">
                            HARI INI
                        </span>

                    </div>

                    <div class="agenda-empty">

                        <div class="empty-icon">📅</div>

                        <strong>
                            Belum Ada Agenda Seleksi
                        </strong>

                        <p>
                            Jadwal wawancara dan kegiatan seleksi
                            akan ditampilkan di bagian ini setelah
                            modul penjadwalan terhubung.
                        </p>

                    </div>

                    <div style="margin-top:14px">
                        <a href="#aktivitas"
                           class="button"
                           style="width:100%">
                            Lihat Aktivitas Pelamar →
                        </a>
                    </div>

                </article>

            </section>


            <!-- =================================================
                 APPLICANT ACTIVITY TABLE
            ================================================== -->

            <section class="card table-card" id="aktivitas">

                <div class="card-header">

                    <div>
                        <div class="card-title">
                            Aktivitas Seleksi Terkini
                        </div>

                        <div class="card-description">
                            Informasi pendaftaran dan perkembangan
                            proses seleksi pelamar
                        </div>
                    </div>

                    <span class="period-label">
                        DATA TERBARU
                    </span>

                </div>


                <div class="table-wrap">

                    <table class="applicant-table"
                           id="applicantTable">

                        <thead>
                            <tr>
                                <th>NAMA PELAMAR</th>
                                <th>POSISI DILAMAR</th>
                                <th>TANGGAL DAFTAR</th>
                                <th>STATUS SELEKSI</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($applicantRows as $applicant)

                                <tr class="applicant-row"
                                    data-search="{{ strtolower($applicant['name'].' '.$applicant['email'].' '.$applicant['position'].' '.$applicant['status']['label']) }}">

                                    <td>
                                        <div class="applicant-name">
                                            {{ $applicant['name'] }}
                                        </div>

                                        <span class="applicant-email">
                                            {{ $applicant['email'] }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $applicant['position'] }}
                                    </td>

                                    <td>
                                        {{ $applicant['date'] }}
                                    </td>

                                    <td>
                                        <span class="status {{ $applicant['status']['class'] }}">
                                            {{ $applicant['status']['label'] }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="empty-table">
                                        Belum ada data lamaran yang dapat ditampilkan.
                                        <br>
                                        Pastikan tabel job_applications sudah berisi data.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="table-footer">
                    Menampilkan maksimal 8 data pendaftaran terbaru.
                    Data diambil dari database Equityworld Futures.
                </div>

            </section>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <footer class="footer">

                <div>
                    <strong>Portal HRD | Equityworld Futures</strong>
                    <br>
                    Sistem pengelolaan rekrutmen dan manajemen talenta.
                </div>

                <div>
                    © {{ date('Y') }} Equityworld Futures.
                    <br>
                    HRD Recruitment Management System.
                </div>

            </footer>

        </div>

    </main>

</div>


<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

    // SIDEBAR MOBILE

    function toggleSidebar() {
        document
            .getElementById('appShell')
            .classList.toggle('sidebar-open');
    }


    // SEARCH PELAMAR

    document
        .getElementById('applicantSearch')
        .addEventListener('input', function () {

            const keyword = this.value.toLowerCase();

            const rows = document.querySelectorAll(
                '#applicantTable tbody .applicant-row'
            );

            rows.forEach(function (row) {

                const content = row.dataset.search || '';

                row.style.display = content.includes(keyword)
                    ? ''
                    : 'none';

            });

        });


    // EXPORT DATA PELAMAR KE CSV

    function exportApplicantTable() {

        const table = document.getElementById('applicantTable');

        if (!table) {
            alert('Tabel pelamar tidak ditemukan.');
            return;
        }

        const rows = Array.from(
            table.querySelectorAll('tr')
        );

        const csv = rows.map(function (row) {

            return Array.from(row.querySelectorAll('th, td'))
                .map(function (cell) {

                    let value = cell.innerText
                        .replace(/\s+/g, ' ')
                        .trim();

                    return '"' + value.replace(/"/g, '""') + '"';

                })
                .join(',');

        }).join('\n');

        const blob = new Blob(
            ['\uFEFF' + csv],
            { type: 'text/csv;charset=utf-8;' }
        );

        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');

        link.href = url;
        link.download = 'laporan-rekrutmen-equityworld.csv';

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);

        URL.revokeObjectURL(url);

    }

</script>

</body>
</html>