<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\JobApplication;
use Throwable;

class JobApplicationController extends Controller
{
    private const DEFAULT_BRANCH = 'Cabang Trillium Surabaya';

    // ==========================================
    // 1. MENAMPILKAN FORMULIR LAMARAN
    // ==========================================

    public function create(Request $request)
    {
        $type = $request->query('type', 'internship');

        if (!in_array($type, ['staff', 'internship'], true)) {
            abort(404);
        }

        $user = Auth::user();

        $position = $request->query('position', '');

        $branch = self::DEFAULT_BRANCH;

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
        $jobType = $request->input('job_type');

        // VALIDASI DATA UMUM

        $rules = [

            'job_type' => 'required|in:staff,internship',

            'nama' => 'required|string|max:255',

            'tempat_lahir' => 'required|string|max:100',

            'tanggal_lahir' => 'required|date|before_or_equal:today',

            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',

            'no_hp' => [
                'required',
                'string',
                'max:25',
                'regex:/^08[1-9][0-9]{7,10}$/'
            ],

            'email' => 'required|email|max:255',

            'domisili' => 'required|string|max:100',

            'alamat' => 'required|string|max:1000',

            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'pas_foto' => 'required|image|mimes:jpg,jpeg,png|max:5120',

            'dokumen_pendukung' => 'nullable|array',

            'dokumen_pendukung.*' =>
                'file|mimes:pdf,jpg,jpeg,png|max:5120',

            'agreement' => 'accepted',

        ];


        // ==========================================
        // VALIDASI KHUSUS STAFF
        // ==========================================

        if ($jobType === 'staff') {

            $rules = array_merge($rules, [

                'posisi' => 'required|string|max:150',

                'availability' => 'required|string|max:100',

                'education' => 'required|string|max:100',

                'university' => 'required|string|max:150',

                'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

                'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            ]);

        }


        // ==========================================
        // VALIDASI KHUSUS MAGANG
        // ==========================================

        elseif ($jobType === 'internship') {

            $rules = array_merge($rules, [

                'kategori' => 'required|in:Magang SMA/SMK,Magang Mahasiswa',

                'jenjang_pendidikan' => 'required|string|max:100',

                'institusi' => 'required|string|max:150',

                'jurusan' => 'required|string|max:100',

                'semester' =>
                    'required_if:kategori,Magang Mahasiswa|nullable|integer|min:1|max:8',

                'tanggal_mulai' => 'required|date|after_or_equal:today',

                'tanggal_selesai' =>
                    'required|date|after_or_equal:tanggal_mulai',

                'surat_pengantar' =>
                    'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

                'identitas' =>
                    'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            ]);

        }


        // PROSES VALIDASI

        $validated = $request->validate($rules);


        // ==========================================
        // MENENTUKAN DATA BERDASARKAN JENIS LAMARAN
        // ==========================================

        if ($jobType === 'staff') {

            $position = $validated['posisi'];

            $availability = $validated['availability'];

            $education = $validated['education'];

            $university = $validated['university'];

            $major = null;

            $semester = null;

            $internshipStart = null;

            $internshipEnd = null;

            $duplicateField = 'posisi';

        } else {

            $position = $validated['kategori'];

            $availability =
                'Periode Magang: ' .
                $validated['tanggal_mulai'] .
                ' s.d. ' .
                $validated['tanggal_selesai'];

            $education = $validated['jenjang_pendidikan'];

            $university = $validated['institusi'];

            $major = $validated['jurusan'];

            $semester = $validated['semester'] ?? null;

            $internshipStart = $validated['tanggal_mulai'];

            $internshipEnd = $validated['tanggal_selesai'];

            $duplicateField = 'kategori';

        }


        // ==========================================
        // CEGAH LAMARAN GANDA
        // ==========================================

        $alreadyApplied = JobApplication::where(
            'user_id',
            Auth::id()
        )
        ->where('job_type', $jobType)
        ->where('position', $position)
        ->exists();

        if ($alreadyApplied) {

            return back()
                ->withErrors([
                    $duplicateField =>
                        'Anda sudah pernah mengirim lamaran untuk posisi ini.'
                ])
                ->withInput();

        }


        // ==========================================
        // PENYIMPANAN DOKUMEN
        // ==========================================

        $storedFiles = [];

        try {

            $storeFile = function ($file, $directory) use (&$storedFiles) {

                $path = $file->store($directory, 'local');

                if (!$path) {
                    throw new \RuntimeException(
                        'Dokumen gagal disimpan.'
                    );
                }

                $storedFiles[] = $path;

                return $path;

            };


            // CV DAN PAS FOTO

            $cvPath = $storeFile(
                $request->file('cv'),
                'applications/cv'
            );

            $photoPath = $storeFile(
                $request->file('pas_foto'),
                'applications/photos'
            );


            // DOKUMEN KHUSUS STAFF / MAGANG

            if ($jobType === 'staff') {

                $ktpPath = $storeFile(
                    $request->file('ktp'),
                    'applications/ktp'
                );

                $transcriptPath = $storeFile(
                    $request->file('ijazah'),
                    'applications/transcripts'
                );

                $identityPath = null;

                $coverLetterPath = null;

            } else {

                $ktpPath = null;

                $transcriptPath = null;

                $identityPath = $storeFile(
                    $request->file('identitas'),
                    'applications/identities'
                );

                $coverLetterPath = $storeFile(
                    $request->file('surat_pengantar'),
                    'applications/cover_letters'
                );

            }


            // DOKUMEN PENDUKUNG OPSIONAL

            $supportingDocuments = [];

            foreach (
                ($request->file('dokumen_pendukung') ?? [])
                as $file
            ) {

                $supportingDocuments[] = $storeFile(
                    $file,
                    'applications/supporting'
                );

            }


            // ==========================================
            // SIMPAN DATA KE MYSQL
            // ==========================================

            $application = DB::transaction(function () use (

                $validated,
                $jobType,
                $position,
                $availability,
                $education,
                $university,
                $major,
                $semester,
                $internshipStart,
                $internshipEnd,
                $cvPath,
                $photoPath,
                $ktpPath,
                $transcriptPath,
                $identityPath,
                $coverLetterPath,
                $supportingDocuments

            ) {

                $application = new JobApplication();

                $application->user_id = Auth::id();

                $application->job_type = $jobType;

                $application->branch = self::DEFAULT_BRANCH;

                $application->full_name = $validated['nama'];

                $application->birth_place =
                    $validated['tempat_lahir'];

                $application->birth_date =
                    $validated['tanggal_lahir'];

                $application->gender =
                    $validated['jenis_kelamin'];

                $application->phone =
                    $validated['no_hp'];

                $application->email =
                    $validated['email'];

                $application->domicile =
                    $validated['domisili'];

                $application->address =
                    $validated['alamat'];

                $application->position = $position;

                $application->availability = $availability;

                $application->education = $education;

                $application->university = $university;

                $application->major = $major;

                $application->semester = $semester;

                $application->internship_start_date =
                    $internshipStart;

                $application->internship_end_date =
                    $internshipEnd;

                $application->cv_path = $cvPath;

                $application->ktp_path = $ktpPath;

                $application->transcript_path =
                    $transcriptPath;

                $application->photo_path = $photoPath;

                $application->identity_path =
                    $identityPath;

                $application->cover_letter_path =
                    $coverLetterPath;

                $application->supporting_documents =
                    $supportingDocuments;

                $application->agreement = true;

                $application->status = 'submitted';

                $application->save();

                return $application;

            });


            // ==========================================
            // BERHASIL
            // ==========================================

            return redirect()
                ->route('pelamar.dashboard')
                ->with(
                    'success',
                    'Lamaran berhasil dikirim dan tersimpan. Silakan pantau status lamaran Anda.'
                );

        } catch (Throwable $exception) {

            // HAPUS FILE JIKA PENYIMPANAN DATABASE GAGAL

            Storage::disk('local')->delete($storedFiles);

            report($exception);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Lamaran belum berhasil disimpan. Silakan periksa kembali data dan dokumen Anda.'
                );

        }

    }
}