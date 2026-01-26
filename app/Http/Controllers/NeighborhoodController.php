<?php

namespace App\Http\Controllers;

use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    public function index()
    {
        // Urutkan biar rapi: Dusun A -> RW 01 -> RT 01
        $neighborhoods = Neighborhood::orderBy('dusun')
                                     ->orderBy('rw')
                                     ->orderBy('rt')
                                     ->paginate(20);
        return view('admin.neighborhoods.index', compact('neighborhoods'));
    }

    public function create()
    {
        return view('admin.neighborhoods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dusun' => 'required|string',
            'rw'    => 'required|string',
            'rt'    => 'required|string',
            'name'  => 'required|string', // Nama Ketua RT
            'phone' => 'nullable|string',
        ]);

        Neighborhood::create($request->all());
        return redirect()->route('admin.neighborhoods.index')->with('success', 'Data RT/RW berhasil ditambahkan');
    }

    public function destroy(Neighborhood $neighborhood)
    {
        $neighborhood->delete();
        return back()->with('success', 'Data dihapus');
    }
}