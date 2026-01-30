<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageOfficial;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::firstOrCreate(['id' => 1], ['village_name' => 'Desa Digital']);
        $officials = VillageOfficial::orderBy('order_level', 'asc')->get();
        
        return view('admin.officials.index', compact('officials', 'profile'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'order_level' => 'required|integer|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('officials', 'public');
        }

        VillageOfficial::create($data);
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    public function edit(VillageOfficial $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, VillageOfficial $official)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'order_level' => 'required|integer|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image']);
        
        if ($request->hasFile('image')) {
            if ($official->image_path) {
                Storage::disk('public')->delete($official->image_path);
            }
            $data['image_path'] = $request->file('image')->store('officials', 'public');
        }

        $official->update($data);
        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat diperbarui!');
    }

    public function destroy(VillageOfficial $official)
    {
        if ($official->image_path) {
            Storage::disk('public')->delete($official->image_path);
        }
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat dihapus.');
    }

    // Update Struktur Organisasi (Gambar Bagan)
    public function updateStructure(Request $request)
    {
        $request->validate([
            'structure_image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $profile = VillageProfile::firstOrFail();

        if ($request->hasFile('structure_image_path')) {
            if ($profile->structure_image_path && Storage::disk('public')->exists($profile->structure_image_path)) {
                Storage::disk('public')->delete($profile->structure_image_path);
            }

            $path = $request->file('structure_image_path')->store('profile', 'public');
            $profile->structure_image_path = $path;
            $profile->save();
        }

        return redirect()->back()->with('success', 'Bagan struktur organisasi berhasil diperbarui!');
    }
}