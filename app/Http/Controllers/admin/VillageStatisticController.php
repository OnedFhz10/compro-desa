<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\VillageStatistic;
use App\Models\VillageProfile;

class VillageStatisticController extends Controller
{
    public function index()
    {
        $statistics = VillageStatistic::whereNotIn('category', ['goldar', 'golongan_darah', 'Golongan Darah'])
            ->get()
            ->groupBy('category');
        $profile = VillageProfile::firstOrCreate(['id' => 1], ['village_name' => 'Desa Digital']);
        return view('admin.statistics.index', compact('statistics', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'stats' => 'required|array',
            'stats.*' => 'required|integer|min:0',
        ]);

        foreach ($request->stats as $id => $value) {
            VillageStatistic::where('id', $id)->update(['value' => $value]);
        }

        return redirect()->route('admin.statistics.index')->with('success', 'Data statistik berhasil diperbarui!');
    }

    public function updateGeneral(Request $request)
    {
        $request->validate([
            'population'      => 'nullable|integer|min:0',
            'total_families'  => 'nullable|integer|min:0',
            'area_size'       => 'nullable|numeric|min:0',
            'rt_count'        => 'nullable|integer|min:0',
            'rw_count'        => 'nullable|integer|min:0',
            'boundary_north'  => 'nullable|string|max:255',
            'boundary_south'  => 'nullable|string|max:255',
            'boundary_east'   => 'nullable|string|max:255',
            'boundary_west'   => 'nullable|string|max:255',
        ]);

        $profile = VillageProfile::firstOrFail();
        $profile->update($request->all());

        return redirect()->route('admin.statistics.index')->with('success', 'Data umum statistik berhasil diperbarui!');
    }
}
