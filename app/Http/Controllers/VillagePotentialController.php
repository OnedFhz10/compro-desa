<?php

namespace App\Http\Controllers;

use App\Models\VillagePotential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillagePotentialController extends Controller
{
    // 1. DAFTAR POTENSI
    public function index()
    {
        $potentials = VillagePotential::latest()->paginate(10);
        return view('admin.potentials.index', compact('potentials'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('admin.potentials.create');
    }

    // 3. SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|string', // Wisata, Produk, Kuliner, dsb.
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price'       => 'nullable|numeric', // Opsional (misal harga tiket/produk)
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        VillagePotential::create($data);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil ditambahkan!');
    }

    // 4. FORM EDIT
    public function edit(VillagePotential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, VillagePotential $potential)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|string',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($potential->image) {
                Storage::disk('public')->delete($potential->image);
            }
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        $potential->update($data);

        return redirect()->route('admin.potentials.index')->with('success', 'Data potensi berhasil diperbarui!');
    }

    // 6. HAPUS DATA
    public function destroy(VillagePotential $potential)
    {
        if ($potential->image) {
            Storage::disk('public')->delete($potential->image);
        }
        
        $potential->delete();

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa dihapus.');
    }
}