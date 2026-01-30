<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    public function index()
    {
        $neighborhoods = Neighborhood::orderBy('dusun')
                                     ->orderBy('rw')
                                     ->orderBy('rt')
                                     ->paginate(15);
        return view('admin.neighborhoods.index', compact('neighborhoods'));
    }

    public function create()
    {
        return view('admin.neighborhoods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dusun'     => 'required|string',
            'rw'        => 'required|string',
            'rt'        => 'required|string',
            'head_name' => 'required|string',
            'phone'     => 'nullable|string',
        ]);

        Neighborhood::create($request->all());

        return redirect()->route('admin.neighborhoods.index')
                         ->with('success', 'Data RT berhasil ditambahkan');
    }

    public function edit(Neighborhood $neighborhood)
    {
        return view('admin.neighborhoods.edit', compact('neighborhood'));
    }

    public function update(Request $request, Neighborhood $neighborhood)
    {
        $request->validate([
            'dusun'     => 'required|string',
            'rw'        => 'required|string',
            'rt'        => 'required|string',
            'head_name' => 'required|string',
            'phone'     => 'nullable|string',
        ]);

        $neighborhood->update($request->all());

        return redirect()->route('admin.neighborhoods.index')
                         ->with('success', 'Data RT berhasil diperbarui');
    }

    public function destroy(Neighborhood $neighborhood)
    {
        $neighborhood->delete();
        return back()->with('success', 'Data dihapus');
    }
}