<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budget;

class TransparencyController extends Controller
{
    // 1. APBDES
    public function apbdes()
    {
        $data = Budget::where('category', 'apbdes')->orderBy('year', 'desc')->get();
        return view('public.transparansi.apbdes', compact('data'));
    }

    // 2. REALISASI ANGGARAN
    public function realisasi()
    {
        $data = Budget::where('category', 'realisasi')->orderBy('year', 'desc')->get();
        return view('public.transparansi.realisasi', compact('data'));
    }

    // 3. LAPORAN KEUANGAN
    public function laporan()
    {
        $data = Budget::where('category', 'laporan')->orderBy('year', 'desc')->get();
        return view('public.transparansi.laporan', compact('data'));
    }
}
