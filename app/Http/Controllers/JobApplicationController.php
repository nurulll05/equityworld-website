<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        // CEK APAKAH PELAMAR SUDAH MEMILIKI LAMARAN AKTIF
        $hasActiveApplication = \App\Models\JobApplication::where('user_id', auth()->id())
            ->whereNotIn('status', ['ditolak', 'dibatalkan'])
            ->exists();

        if ($hasActiveApplication) {
            return redirect()
                ->route('pelamar.dashboard', ['tab' => 'lamaran'])
                ->with('info', 'Anda masih memiliki lamaran aktif. Pantau status lamaran Anda melalui dashboard.');
        }
        // Membedakan form Magang dan Staff
        $isInternship = $request->has('kategori');

        // Validasi data pribadi
        $rules = [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string|max:25',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'pas_foto' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'dokumen_pendukung' => 'nullable|array',
            'dokumen_pendukung.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];

        if ($isInternship) {
            $rules = array_merge($rules, [
                'kategori' => 'required|in:Magang SMA/SMK,Magang Mahasiswa',
                'jenjang_pendidikan' => 'required|string|max:100',
                'institusi' => 'required|string|max:150',
                'jurusan' => 'required|string|max:150',
                'semester' => 'required_if:kategori,Magang Mahasiswa|nullable|integer|min:1|max:8',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after:tanggal_mulai',
                'identitas' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'surat_pengantar' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'posisi' => 'required|string|max:150',
            ]);
        } else {
            $rules = array_merge($rules, [
                'posisi' => 'required|string|max:150',
                'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            ]);
        }

        $validated = $request->validate($rules);

        // Simpan dokumen utama
        $cvPath = $request->file('cv')->store('applications/cv');
        $photoPath = $request->file('pas_foto')->store('applications/photos');

        $ktpPath = null;
        $transcriptPath = null;
        $supportingDocuments = [];

        if ($isInternship) {
            $ktpPath = $request->file('identitas')->store('applications/identity');

            $supportingDocuments[] = $request
                ->file('surat_pengantar')
                ->store('applications/supporting');

            $jobType = 'internship';
            $category = $validated['kategori'];
            $position = $validated['posisi'] ?? 'Program Magang';
            $education = $validated['jenjang_pendidikan'];
            $university = $validated['institusi'];
            $major = $validated['jurusan'];

            $semester = $category === 'Magang Mahasiswa'
                ? ($validated['semester'] ?? null)
                : null;

            $startDate = $validated['tanggal_mulai'];
            $endDate = $validated['tanggal_selesai'];
        } else {
            $ktpPath = $request->file('ktp')->store('applications/identity');
            $transcriptPath = $request->file('ijazah')->store('applications/transcripts');

            $jobType = 'staff';
            $category = null;
            $position = $validated['posisi'];
            $education = null;
            $university = null;
            $major = null;
            $semester = null;
            $startDate = null;
            $endDate = null;
        }

        // Simpan dokumen pendukung tambahan
        if ($request->hasFile('dokumen_pendukung')) {
            foreach ($request->file('dokumen_pendukung') as $document) {
                $supportingDocuments[] = $document->store('applications/supporting');
            }
        }

        // Simpan data lamaran
        JobApplication::create([
            'user_id' => Auth::id(),
            'job_type' => $jobType,
            'branch' => 'Cabang Trillium Surabaya',
            'full_name' => $validated['nama'],
            'birth_place' => $validated['tempat_lahir'],
            'birth_date' => $validated['tanggal_lahir'],
            'gender' => $validated['jenis_kelamin'],
            'phone' => $validated['no_hp'],
            'email' => $validated['email'],
            'domicile' => null,
            'address' => $validated['alamat'],
            'position' => $position,
            'availability' => null,
            'education' => $education,
            'university' => $university,
            'internship_category' => $category,
            'major' => $major,
            'semester' => $semester,
            'internship_start_date' => $startDate,
            'internship_end_date' => $endDate,
            'cv_path' => $cvPath,
            'ktp_path' => $ktpPath,
            'transcript_path' => $transcriptPath,
            'photo_path' => $photoPath,
            'supporting_documents' => $supportingDocuments,
            'agreement' => false,
            'status' => 'submitted',
        ]);

        return redirect()
            ->route('pelamar.dashboard', ['tab' => 'lamaran'])
            ->with('success', 'Lamaran berhasil dikirim! Terima kasih telah mendaftar di PT Equityworld Futures.');
    }
}
