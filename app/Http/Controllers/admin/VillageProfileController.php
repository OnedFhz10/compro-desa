<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $request->validate([
            'village_name' => 'required|string|max:255',
            'history'      => 'nullable|string',
            'vision'       => 'nullable|string',
            'mission'      => 'nullable|string',
            'address'      => 'nullable|string',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            'logo_path'    => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'structure_image_path' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120',
        ]);

        $profile = VillageProfile::firstOrFail();
        
        // Ambil semua input kecuali file
        $data = $request->except(['logo_path', 'structure_image_path']);

        // Handle Upload Logo
        if ($request->hasFile('logo_path')) {
            if ($profile->logo_path && Storage::disk('public')->exists($profile->logo_path)) {
                Storage::disk('public')->delete($profile->logo_path);
            }
            $data['logo_path'] = $request->file('logo_path')->store('profile', 'public');
        }

        // Handle Upload Struktur
        if ($request->hasFile('structure_image_path')) {
            if ($profile->structure_image_path && Storage::disk('public')->exists($profile->structure_image_path)) {
                Storage::disk('public')->delete($profile->structure_image_path);
            }
            $data['structure_image_path'] = $request->file('structure_image_path')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil desa berhasil diperbarui!');
    }
}