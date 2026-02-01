<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillagePotential;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VillagePotentialController extends Controller
{
    public function index()
    {
        $potentials = VillagePotential::latest()->paginate(10);
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        return view('admin.potentials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|string', // Validasi kategori
            'description' => 'required',
            'address'     => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('potentials', 'public');
        }

        VillagePotential::create($data);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil ditambahkan!');
    }

    public function edit(VillagePotential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, VillagePotential $potential)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|string',
            'description' => 'required',
            'address'     => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image']);
        // $data['slug'] = Str::slug($request->title); // Opsional update slug

        if ($request->hasFile('image')) {
            if ($potential->image_path && Storage::disk('public')->exists($potential->image_path)) {
                Storage::disk('public')->delete($potential->image_path);
            }
            $data['image_path'] = $request->file('image')->store('potentials', 'public');
        }

        $potential->update($data);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil diperbarui!');
    }

    public function destroy(VillagePotential $potential)
    {
        if ($potential->image_path && Storage::disk('public')->exists($potential->image_path)) {
            Storage::disk('public')->delete($potential->image_path);
        }
        
        $potential->delete();
        return redirect()->route('admin.potentials.index')->with('success', 'Data dihapus.');
    }
}