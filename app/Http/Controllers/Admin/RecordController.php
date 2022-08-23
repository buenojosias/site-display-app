<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

use App\Models\{
    Driver, Company, Advertising, Display
};

class RecordController extends Controller
{
    public function index() {
        $date = '2022-08-13';
        
        $drivers = Driver::
            where('active', 1)
            ->whereHas('displays', function ($query) {
                $query->whereDate('datetime', '=', '2022-08-13');
            })
            ->with('displays', function ($query) {
                $query->whereDate('datetime', '=', '2022-08-13');
            })
            ->withSum('displays', 'cost', function (Builder $query) {
                $query->whereDate('datetime', '=', '2022-08-13');
            })
            ->get();

        // $displays = Display::with('driver','advertising')->limit(100)->get()->groupBy('driver_id');
        return view('admin.records', compact(['drivers','date']));
    }

}

// select(DB::raw('DATE(datetime) as date'), DB::raw('count(*) as total'))
//         ->groupBy('date')
//         ->orderBy('date', 'desc')
//         ->take(7)
//         ->get();