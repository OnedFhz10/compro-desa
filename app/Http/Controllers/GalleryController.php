<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // 1. TAMPILKAN GALERI (GRID VIEW)
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12); // Tampilkan 12 foto per halaman
        return view('admin.galleries.index', compact('galleries'));
    }

    // 2. FORM UPLOAD
    public function create()
    {
        return view('admin.galleries.create');
    }

    // 3. SIMPAN FOTO
    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
        ];

        // Upload Gambar
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    // 4. FORM EDIT (Untuk ubah caption/judul)
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Keterangan foto diperbarui.');
    }

    // 6. HAPUS FOTO
    public function destroy(Gallery $gallery)
    {
        // Hapus file fisik
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto dihapus dari galeri.');
    }
}