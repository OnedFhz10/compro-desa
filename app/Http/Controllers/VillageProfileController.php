<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function edit()
    {
        $profile = VillageProfile::firstOrCreate(
            ['id' => 1],
            ['village_name' => 'Desa Digital']
        );
        
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        // 1. Validasi (Sesuaikan nama input dengan kolom database)
        $request->validate([
            'village_name' => 'required|string|max:255',
            'history'      => 'nullable|string', // SEBELUMNYA: description
            'vision'       => 'nullable|string',
            'mission'      => 'nullable|string',
            'address'      => 'nullable|string',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            'logo_path'    => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // SEBELUMNYA: logo
            'structure_image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120',
        ], [
            'village_name.required' => 'Nama desa wajib diisi.',
            'logo_path.image'       => 'File logo harus berupa gambar.',
            'logo_path.max'         => 'Ukuran logo maksimal 2MB.',
        ]);

        $profile = VillageProfile::firstOrFail();
        
        // Ambil semua input kecuali file
        $data = $request->except(['logo_path', 'structure_image']);

        // 2. Handle Upload Logo (Simpan ke kolom logo_path)
        if ($request->hasFile('logo_path')) {
            // Hapus file lama
            if ($profile->logo_path && Storage::disk('public')->exists($profile->logo_path)) {
                Storage::disk('public')->delete($profile->logo_path);
            }
            // Simpan file baru
            $data['logo_path'] = $request->file('logo_path')->store('profile', 'public');
        }

        // 3. Handle Upload Struktur (Opsional jika masih ada di form ini)
        if ($request->hasFile('structure_image')) {
            if ($profile->structure_image && Storage::disk('public')->exists($profile->structure_image)) {
                Storage::disk('public')->delete($profile->structure_image);
            }
            $data['structure_image'] = $request->file('structure_image')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil desa berhasil diperbarui!');
    }
}