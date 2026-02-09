<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role (hindari duplikat)
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $contentAdminRole = Role::firstOrCreate(['name' => 'Admin Konten']);

        // 2. Buat User Super Admin
        User::firstOrCreate(
            ['email' => 'admin@desa.id'], // Cek berdasarkan email
            [
                'role_id' => $superAdminRole->id,
                'name' => 'Administrator Desa',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password123')), // Gunakan ENV
            ]
        );

        // 3. Buat User Admin Konten (Contoh)
        User::firstOrCreate(
            ['email' => 'penulis@desa.id'],
            [
                'role_id' => $contentAdminRole->id,
                'name' => 'Penulis Berita',
                'password' => Hash::make(env('EDITOR_PASSWORD', 'password123')), // Gunakan ENV
            ]
        );
    }
}