<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $profile = \App\Models\VillageProfile::first();
        $statistics = \App\Models\VillageStatistic::all()->groupBy('category');
        return view('public.statistics.index', compact('statistics', 'profile'));
    }
}
