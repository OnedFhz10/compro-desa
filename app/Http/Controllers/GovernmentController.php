<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VillageOfficial;
use App\Models\VillageInstitution;
use App\Models\Neighborhood;

class GovernmentController extends Controller
{
    // 1. STRUKTUR ORGANISASI
    public function structure()
    {
        return view('public.pemerintahan.struktur');
    }

    // 2. PERANGKAT DESA
    public function officials()
    {
        $officials = \Illuminate\Support\Facades\Cache::remember('officials_list', 60*24, function () {
            return VillageOfficial::orderBy('order_level', 'asc')->get();
        });
        return view('public.pemerintahan.perangkat', compact('officials'));
    }

    // 3. LEMBAGA DESA
    public function institutions()
    {
        $institutions = \Illuminate\Support\Facades\Cache::remember('institutions_list', 60*24, function () {
            return VillageInstitution::all();
        });
        return view('public.pemerintahan.lembaga', compact('institutions'));
    }

    public function showInstitution(VillageInstitution $institution)
    {
        $pageTitle = $institution->name;
        return view('public.pemerintahan.lembaga_show', compact('institution', 'pageTitle'));
    }

    // 4. DATA RT/RW (WILAYAH)
    public function rtrw()
    {
        $neighborhoods = \Illuminate\Support\Facades\Cache::remember('rtrw_data', 60*24, function () {
            return Neighborhood::orderBy('dusun')
                                ->orderBy('rw')
                                ->orderBy('rt')
                                ->get()
                                ->groupBy(['dusun', 'rw']);
        });
                                     
        return view('public.pemerintahan.rt_rw', compact('neighborhoods'));
    }
}
