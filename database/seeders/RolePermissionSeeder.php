<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            // 1. DATA 3 ROLE UTAMA
            $roles = [
                [
                    'name' => 'Admin',
                    'slug' => 'admin',
                    'description' => 'Mengelola administrasi website dan hak akses sistem.',
                ],
                [
                    'name' => 'HRD',
                    'slug' => 'hrd',
                    'description' => 'Mengelola proses rekrutmen.',
                ],
                [
                    'name' => 'Pelamar',
                    'slug' => 'pelamar',
                    'description' => 'Mengakses profil dan lamaran sendiri.',
                ],
            ];

            foreach ($roles as $role) {
                DB::table('roles')->updateOrInsert(
                    ['slug' => $role['slug']],
                    [
                        'name' => $role['name'],
                        'description' => $role['description'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }

            // 2. DATA PERMISSION
            $permissions = [
                ['name' => 'Melihat Dashboard', 'slug' => 'dashboard.view'],
                ['name' => 'Melihat Pengguna', 'slug' => 'users.view'],
                ['name' => 'Menambah Pengguna', 'slug' => 'users.create'],
                ['name' => 'Mengubah Status Pengguna', 'slug' => 'users.update-status'],
                ['name' => 'Melihat Role', 'slug' => 'roles.view'],
                ['name' => 'Mengelola Role', 'slug' => 'roles.manage'],
                ['name' => 'Melihat Data Pelamar', 'slug' => 'applications.view'],
                ['name' => 'Mengelola Lamaran', 'slug' => 'applications.manage'],
                ['name' => 'Mengelola Website', 'slug' => 'website.manage'],
                ['name' => 'Mengelola Profil', 'slug' => 'profile.manage'],
            ];

            foreach ($permissions as $permission) {
                DB::table('permissions')->updateOrInsert(
                    ['slug' => $permission['slug']],
                    [
                        'name' => $permission['name'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }

            // 3. AMBIL ID ROLE DAN PERMISSION
            $roleIds = DB::table('roles')
                ->whereIn('slug', ['admin', 'hrd', 'pelamar'])
                ->pluck('id', 'slug');

            $permissionIds = DB::table('permissions')
                ->pluck('id', 'slug');

            // 4. HAK AKSES SETIAP ROLE
            $rolePermissions = [

                // Admin mendapatkan seluruh permission
                'admin' => array_keys($permissionIds->toArray()),

                'hrd' => [
                    'dashboard.view',
                    'applications.view',
                    'applications.manage',
                    'profile.manage',
                ],

                'pelamar' => [
                    'dashboard.view',
                    'profile.manage',
                ],
            ];

            // Sinkronisasi permission setiap role
            foreach ($rolePermissions as $roleSlug => $permissionSlugs) {

                $roleId = $roleIds[$roleSlug];

                // Hapus relasi permission lama
                DB::table('permission_role')
                    ->where('role_id', $roleId)
                    ->delete();

                // Masukkan permission terbaru
                foreach ($permissionSlugs as $permissionSlug) {

                    DB::table('permission_role')->insert([
                        'role_id' => $roleId,
                        'permission_id' => $permissionIds[$permissionSlug],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // 5. HUBUNGKAN SELURUH USER DENGAN 3 ROLE
            $users = User::all();

            foreach ($users as $user) {

                // Super Admin tetap menggunakan role admin.
                // Perbedaan akses ditentukan oleh is_super_admin.
                $roleSlug = $user->role;

                if (!isset($roleIds[$roleSlug])) {
                    continue;
                }

                // Hapus relasi role lama agar tidak terjadi
                // lebih dari satu role pada akun pengguna.
                DB::table('role_user')
                    ->where('user_id', $user->id)
                    ->delete();

                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $roleIds[$roleSlug],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 6. HAPUS ROLE SUPER ADMIN LAMA
            $oldSuperAdminRole = DB::table('roles')
                ->where('slug', 'super-admin')
                ->first();

            if ($oldSuperAdminRole) {

                DB::table('role_user')
                    ->where('role_id', $oldSuperAdminRole->id)
                    ->delete();

                DB::table('permission_role')
                    ->where('role_id', $oldSuperAdminRole->id)
                    ->delete();

                DB::table('roles')
                    ->where('id', $oldSuperAdminRole->id)
                    ->delete();
            }

        });
    }
}
