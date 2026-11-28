<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleManagementController extends Controller
{
    // MENAMPILKAN DAFTAR ROLE
    public function index()
    {
        $roles = Role::withCount('users')
            ->with('permissions')
            ->orderBy('id')
            ->get();

        return view('admin.roles.index', compact('roles'));
    }

    // MENAMPILKAN FORM TAMBAH ROLE
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    // MENYIMPAN ROLE BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:roles,name',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
        ]);

        $role->permissions()->sync($validated['permissions'] ?? []);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    // MENAMPILKAN FORM EDIT ROLE
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();

        $role->load('permissions');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    // MEMPERBARUI ROLE
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:roles,name,' . $role->id,
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ];

        // Slug role bawaan tidak boleh berubah
        if (!in_array($role->slug, ['admin', 'hrd', 'pelamar'])) {
            $data['slug'] = Str::slug($validated['name']);
        }

        $role->update($data);

        $role->permissions()->sync($validated['permissions'] ?? []);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role berhasil diperbarui.');
    }
}
