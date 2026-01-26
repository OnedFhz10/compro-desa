<?php

namespace App\Http\Controllers;

use App\Models\VillageOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::orderBy('order_level', 'asc')->get();
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        // VALIDASI UPDATE: Tambah NIP dan Phone
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'nip'         => 'nullable|string|max:50',  // Baru
            'phone'       => 'nullable|string|max:20',  // Baru
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
            'nip'         => 'nullable|string|max:50',
            'phone'       => 'nullable|string|max:20',
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
}