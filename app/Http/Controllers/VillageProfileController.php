<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillageProfile;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function edit()
    {
        // Ambil data profil pertama (karena hanya ada satu desa)
        $profile = VillageProfile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        // 1. Ambil data profil yang akan diedit
        $profile = VillageProfile::first();

        // 2. Validasi Input
        $validated = $request->validate([
            'village_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'history' => 'nullable|string',
            'structure' => 'nullable|image|max:4096',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // 3. Cek apakah ada file logo yang diupload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($profile->logo_path) {
                Storage::disk('public')->delete($profile->logo_path);
            }
            // Simpan logo baru ke folder 'uploads'
            $path = $request->file('logo')->store('uploads', 'public');
            $validated['logo_path'] = $path;
        }
        if ($request->hasFile('structure')) {
    if ($profile->structure_image_path) {
        Storage::disk('public')->delete($profile->structure_image_path);
    }
    $pathStruct = $request->file('structure')->store('uploads', 'public');
    $validated['structure_image_path'] = $pathStruct; // Masukkan ke array update
}

        // 4. Simpan perubahan ke database
        $profile->update($validated);

        // 5. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Profil Desa berhasil diperbarui!');
    }
}