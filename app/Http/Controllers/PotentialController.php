<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VillagePotential;

class PotentialController extends Controller
{
    // 1. DAFTAR POTENSI
    public function index()
    {
        $potentials = VillagePotential::latest()->paginate(9);
        $categories = VillagePotential::select('category')->distinct()->pluck('category');

        return view('public.potensi.index', compact('potentials', 'categories'));
    }

    // 2. FILTER KATEGORI
    public function category($category)
    {
        $potentials = VillagePotential::where('category', $category)->latest()->paginate(9);
        $categories = VillagePotential::select('category')->distinct()->pluck('category');
        
        return view('public.potensi.index', compact('potentials', 'categories'));
    }

    // 3. DETAIL POTENSI
    public function show($slug)
    {
        $potential = VillagePotential::where('slug', $slug)->firstOrFail();
        $others = VillagePotential::where('id', '!=', $potential->id)->inRandomOrder()->limit(3)->get();

        return view('public.potensi.show', compact('potential', 'others'));
    }
}
