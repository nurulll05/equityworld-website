<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    // MENAMPILKAN DAFTAR USER
    public function index(Request $request)
    {
        $query = User::query();

        // Pencarian nama dan email
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status akun
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Data pengguna dengan pagination
        $users = $query->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistik pengguna
        $statistics = [
            'total' => User::count(),
            'admin' => User::where('role', 'admin')->count(),
            'hrd' => User::where('role', 'hrd')->count(),
            'pelamar' => User::where('role', 'pelamar')->count(),
        ];

        return view('admin.users.index', compact(
            'users',
            'statistics'
        ));
    }


    // MENGUBAH STATUS AKUN
    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $newStatus = $request->boolean('is_active');

        // Admin tidak boleh menonaktifkan akunnya sendiri
        if ($user->id === Auth::id() && !$newStatus) {
            return back()->with(
                'error',
                'Kamu tidak dapat menonaktifkan akun sendiri.'
            );
        }

        // Mencegah penonaktifan admin aktif terakhir
        if (
            $user->role === 'admin' &&
            $user->is_active &&
            !$newStatus &&
            User::where('role', 'admin')
                ->where('is_active', true)
                ->count() <= 1
        ) {
            return back()->with(
                'error',
                'Tidak dapat menonaktifkan administrator aktif terakhir.'
            );
        }

        $user->is_active = $newStatus;

        if (!$newStatus) {
            $user->active_session_id = null;
            $user->active_session_last_activity = null;
        }

        $user->save();

        return back()->with(
            'success',
            $newStatus
                ? 'Akun berhasil diaktifkan.'
                : 'Akun berhasil dinonaktifkan.'
        );
    }


    // MENAMPILKAN FORM TAMBAH USER
    public function create()
    {
        return view('admin.users.create');
    }


    // MENYIMPAN USER BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'role' => 'required|in:admin,hrd',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'role.required' => 'Role pengguna wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User baru berhasil ditambahkan.');
    }
}