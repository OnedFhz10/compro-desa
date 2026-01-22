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
        // 1. Buat Role
        Role::create(['name' => 'Super Admin']);  // ID 1
        Role::create(['name' => 'Admin Konten']); // ID 2

        // 2. Buat User Super Admin
        User::create([
            'role_id' => 1, // Super Admin
            'name' => 'Administrator Desa',
            'email' => 'admin@desa.id',
            'password' => Hash::make('password123'), // Ganti nanti saat production!
        ]);

        // 3. Buat User Admin Konten (Contoh)
        User::create([
            'role_id' => 2,
            'name' => 'Penulis Berita',
            'email' => 'penulis@desa.id',
            'password' => Hash::make('password123'),
        ]);
    }
}