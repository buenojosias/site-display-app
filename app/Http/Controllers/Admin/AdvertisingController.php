<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;
use Illuminate\Support\Facades\DB;

class AdvertisingController extends Controller
{
    public function show(Advertising $advertising)
    {
        $company = $advertising->load('company');
        $video = $advertising->load('video');
        $displays = $advertising->displays()->count();
        $accesses = $advertising->accesses()->count();
        $dailyDisplays = $advertising->displays()->select(DB::raw('DATE(datetime) as date'), DB::raw('count(*) as total'))
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->take(7)
        ->get();

        return view('admin.advertising.show', compact('advertising','company','displays','accesses','dailyDisplays'));
    }

    public function displays(Advertising $advertising)
    {
        return view('admin.advertising.displays', compact('advertising'));
    }
}
