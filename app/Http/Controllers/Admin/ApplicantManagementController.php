<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantManagementController extends Controller
{
    public function index(Request $request)
    {
        // Menghitung total pelamar
        $totalStaff = JobApplication::where('job_type', 'staff')->count();

        $totalInternship = JobApplication::where('job_type', 'internship')->count();

        // Query daftar pelamar
        $query = JobApplication::with('user');

        // Filter jenis lamaran
        if (
            $request->filled('type') &&
            in_array($request->type, ['staff', 'internship'], true)
        ) {
            $query->where('job_type', $request->type);
        }

        // Pencarian pelamar
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%");
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pagination
        $applicants = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.applicants.index', compact(
            'totalStaff',
            'totalInternship',
            'applicants'
        ));
    }

    // Mengambil detail pelamar
    public function show($id)
    {
        $applicant = JobApplication::with('user')->findOrFail($id);

        return response()->json($applicant);
    }

    // Membuka dokumen pelamar di browser
    public function viewDocument($id, $document)
    {
        $applicant = JobApplication::findOrFail($id);

        // Daftar dokumen yang boleh diakses
        $documents = [
            'cv' => $applicant->cv_path,
            'transcript' => $applicant->transcript_path,
            'photo' => $applicant->photo_path,
            'ktp' => $applicant->ktp_path,
        ];

        // Pastikan jenis dokumen valid
        if (!array_key_exists($document, $documents)) {
            abort(404);
        }

        $path = $documents[$document];

        // Pastikan dokumen tersedia
        if (!$path || !Storage::disk('local')->exists($path)) {
            abort(404, 'Dokumen tidak ditemukan.');
        }

        // Pastikan hanya PDF dan gambar yang ditampilkan
        $mimeType = Storage::disk('local')->mimeType($path);

        if (!in_array($mimeType, [
            'application/pdf',
            'image/jpeg',
            'image/png',
        ], true)) {
            abort(404, 'Format dokumen tidak didukung.');
        }

        return response()->file(
            Storage::disk('local')->path($path),
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }
}
