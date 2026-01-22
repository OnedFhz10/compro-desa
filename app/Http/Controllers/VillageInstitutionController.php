<?php

namespace App\Http\Controllers;

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
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = $request->file('image') ? $request->file('image')->store('institutions', 'public') : null;

        VillageInstitution::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'description' => $request->description,
            'image_path' => $path
        ]);

        return redirect()->route('admin.institutions.index')->with('success', 'Lembaga berhasil ditambahkan!');
    }

    public function destroy(VillageInstitution $institution)
    {
        if ($institution->image_path) Storage::disk('public')->delete($institution->image_path);
        $institution->delete();
        return back()->with('success', 'Lembaga dihapus!');
    }
}