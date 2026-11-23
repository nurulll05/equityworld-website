<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    // ==========================================
    // 1. MENAMPILKAN FORMULIR LAMARAN
    // ==========================================

    public function create(Request $request)
    {
        $type = $request->query('type', 'internship');

        // VALIDASI JENIS LOWONGAN

        if (!in_array($type, ['staff', 'internship'], true)) {
            abort(404);
        }

        $user = Auth::user();

        $position = $request->query('position', '');

        $branch = $request->query(
            'branch',
            'Cabang Trillium Surabaya'
        );

        return view('applications.create', compact(
            'user',
            'type',
            'position',
            'branch'
        ));
    }


    // ==========================================
    // 2. PROSES PENGIRIMAN LAMARAN
    // ==========================================

    public function store(Request $request)
    {
        $validated = $request->validate([

            'job_type' => 'required|in:staff,internship',

            'branch' => 'required|string|max:150',

            'full_name' => 'required|string|max:255',

            'phone' => 'required|string|max:25',

            'email' => 'required|email|max:255',

            'domicile' => 'required|string|max:100',

            'position' => 'required|string|max:150',

            'availability' => 'required|string|max:100',

            'education' => 'required|string|max:100',

            'university' => 'required|string|max:150',

            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'transcript' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',

            'agreement' => 'accepted',

        ]);

        // SIMPAN DOKUMEN KE STORAGE LOKAL

        $cvPath = $request->file('cv')
            ->store('applications/cv');

        $transcriptPath = $request->file('transcript')
            ->store('applications/transcripts');

        $photoPath = $request->file('photo')
            ->store('applications/photos');


        // SIMPAN DATA LAMARAN KE MYSQL

        JobApplication::create([

            'user_id' => Auth::id(),

            'job_type' => $validated['job_type'],

            'branch' => $validated['branch'],

            'full_name' => $validated['full_name'],

            'phone' => $validated['phone'],

            'email' => $validated['email'],

            'domicile' => $validated['domicile'],

            'position' => $validated['position'],

            'availability' => $validated['availability'],

            'education' => $validated['education'],

            'university' => $validated['university'],

            'cv_path' => $cvPath,

            'transcript_path' => $transcriptPath,

            'photo_path' => $photoPath,

            'agreement' => true,

            'status' => 'submitted',

        ]);


        // KEMBALI KE DASHBOARD PELAMAR

        return redirect()
            ->route('pelamar.dashboard')
            ->with(
                'success',
                'Lamaran berhasil dikirim! Silakan pantau status lamaran Anda.'
            );
    }
}