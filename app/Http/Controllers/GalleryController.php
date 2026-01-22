<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12); // Tampilkan 12 foto per halaman
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // Max 2MB
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diupload!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();
        return back()->with('success', 'Foto dihapus!');
    }
}