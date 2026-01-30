<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');

        // Simpan ke image_path
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('galleries', 'public');
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diupload!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Foto dihapus.');
    }
}