<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageInstitution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageInstitutionController extends Controller
{
    public function index()
    {
        $institutions = VillageInstitution::all();
        return view('admin.institutions.index', compact('institutions'));
    }

    public function create()
    {
        return view('admin.institutions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'abbreviation' => 'nullable|string|max:50',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('institutions', 'public');
        }

        VillageInstitution::create([
            'name'         => $request->name,
            'abbreviation' => $request->abbreviation,
            'description'  => $request->description,
            'image_path'   => $path
        ]);

        return redirect()->route('admin.institutions.index')->with('success', 'Lembaga berhasil ditambahkan!');
    }

    public function edit(VillageInstitution $institution)
    {
        return view('admin.institutions.edit', compact('institution'));
    }

    public function update(Request $request, VillageInstitution $institution)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'abbreviation' => 'nullable|string|max:50',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = [
            'name'         => $request->name,
            'abbreviation' => $request->abbreviation,
            'description'  => $request->description,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($institution->image_path) {
                Storage::disk('public')->delete($institution->image_path);
            }
            $data['image_path'] = $request->file('image')->store('institutions', 'public');
        }

        $institution->update($data);

        return redirect()->route('admin.institutions.index')->with('success', 'Lembaga berhasil diperbarui!');
    }

    public function destroy(VillageInstitution $institution)
    {
        if ($institution->image_path) {
            Storage::disk('public')->delete($institution->image_path);
        }
        
        $institution->delete();
        return back()->with('success', 'Lembaga dihapus!');
    }
}