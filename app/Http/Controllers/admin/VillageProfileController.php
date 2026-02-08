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
            // Basic Info
            'village_name' => 'required|string|max:255',
            'address'      => 'nullable|string',
            'postal_code'  => 'nullable|string|max:10',
            'district'     => 'nullable|string|max:100',
            'regency'      => 'nullable|string|max:100',
            'province'     => 'nullable|string|max:100',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            
            // Content
            'history'      => 'nullable|string',
            'vision'       => 'nullable|string',
            'mission'      => 'nullable|string',
            
            // Statistics
            'population'   => 'nullable|integer|min:0',
            'area_size'    => 'nullable|numeric|min:0',
            'rt_count'     => 'nullable|integer|min:0',
            'rw_count'     => 'nullable|integer|min:0',
            
            // Images
            'logo_path'    => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $profile = VillageProfile::firstOrFail();
        
        // Ambil semua input kecuali file
        $data = $request->except(['logo_path']);

        // Handle Upload Logo
        if ($request->hasFile('logo_path')) {
            if ($profile->logo_path && Storage::disk('public')->exists($profile->logo_path)) {
                Storage::disk('public')->delete($profile->logo_path);
            }
            $data['logo_path'] = $request->file('logo_path')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil desa berhasil diperbarui!');
    }
}