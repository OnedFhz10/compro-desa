<?php

namespace App\Http\Controllers;

use App\Models\VillageOfficial;
use App\Models\VillageProfile; // <--- JANGAN LUPA IMPORT INI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        // Ambil data profile untuk menampilkan gambar struktur
        $profile = VillageProfile::firstOrCreate(['id' => 1], ['village_name' => 'Desa Digital']);
        
        // Ambil data perangkat desa
        $officials = VillageOfficial::orderBy('order_level', 'asc')->get();
        
        return view('admin.officials.index', compact('officials', 'profile'));
    }

    // --- FUNGSI BARU: UPDATE STRUKTUR ---
    public function updateStructure(Request $request)
    {
        $request->validate([
            'structure_image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
        ], [
            'structure_image_path.required' => 'Pilih gambar struktur terlebih dahulu.',
            'structure_image_path.image'    => 'File harus berupa gambar.',
            'structure_image_path.max'      => 'Ukuran maksimal 5MB.',
        ]);

        $profile = VillageProfile::firstOrFail();

        // Proses Upload
        if ($request->hasFile('structure_image_path')) {
            // Hapus gambar lama jika ada
            if ($profile->structure_image_path && Storage::disk('public')->exists($profile->structure_image_path)) {
                Storage::disk('public')->delete($profile->structure_image_path);
            }

            // Simpan gambar baru
            $path = $request->file('structure_image_path')->store('profile', 'public');
            
            // Simpan ke database
            $profile->structure_image_path = $path;
            $profile->save();
        }

        return redirect()->back()->with('success', 'Bagan struktur organisasi berhasil diperbarui!');
    }

    // ... FUNGSI LAIN (create, store, edit, update, destroy) BIARKAN TETAP SAMA ...
    public function create() { return view('admin.officials.create'); }
    
    public function store(Request $request) { /* Code Lama... */ 
         // ... (copy dari file lama Anda) ...
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

    public function edit(VillageOfficial $official) { return view('admin.officials.edit', compact('official')); }

    public function update(Request $request, VillageOfficial $official) { /* Code Lama... */ 
        // ... (copy dari file lama Anda) ...
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

    public function destroy(VillageOfficial $official) { /* Code Lama... */ 
        if ($official->image_path) {
            Storage::disk('public')->delete($official->image_path);
        }
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat dihapus.');
    }
}