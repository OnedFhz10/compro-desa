<?php

namespace App\Http\Controllers;

use App\Models\VillageOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::orderBy('id', 'asc')->get();
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('officials', 'public');
        }

        VillageOfficial::create([
            'name' => $request->name,
            'position' => $request->position,
            'image_path' => $path
        ]);

        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa ditambahkan!');
    }

    public function edit(VillageOfficial $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, VillageOfficial $official)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($official->image_path) Storage::disk('public')->delete($official->image_path);
            $official->image_path = $request->file('image')->store('officials', 'public');
        }

        $official->update([
            'name' => $request->name,
            'position' => $request->position,
            // image_path diupdate otomatis jika ada file baru di atas
        ]);

        // Trik: Jika image_path diupdate manual lewat query di atas, pastikan logicnya benar.
        // Cara yang lebih aman untuk update parsial:
        if ($request->hasFile('image')) {
             $official->image_path = $official->image_path; // Refresh model
             $official->save();
        }

        return redirect()->route('admin.officials.index')->with('success', 'Data diperbarui!');
    }

    public function destroy(VillageOfficial $official)
    {
        if ($official->image_path) Storage::disk('public')->delete($official->image_path);
        $official->delete();
        return back()->with('success', 'Data dihapus!');
    }
}