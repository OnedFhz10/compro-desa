<?php

namespace App\Http\Controllers;

use App\Models\VillagePotential;
use Illuminate\Http\Request;
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
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('potentials', 'public');
        }

        VillagePotential::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image_path' => $path
        ]);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa ditambahkan!');
    }

    public function edit(VillagePotential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, VillagePotential $potential)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($potential->image_path) Storage::disk('public')->delete($potential->image_path);
            $potential->image_path = $request->file('image')->store('potentials', 'public');
        }

        $potential->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) $potential->save();

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi diperbarui!');
    }

    public function destroy(VillagePotential $potential)
    {
        if ($potential->image_path) Storage::disk('public')->delete($potential->image_path);
        $potential->delete();
        return back()->with('success', 'Data dihapus!');
    }
}