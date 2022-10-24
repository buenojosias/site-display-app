<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Company, Driver, Advertising, Display };

class DashboardController extends Controller
{
    public function index()
    {
        $companiesCount = Company::count();
        $driversCount = Driver::count();
        $advertisingsCount = Advertising::count();
        $lastDisplays = Display::whereDate('datetime', date('Ymd'))->with(['advertising.company','driver'])->orderBy('datetime', 'desc')->limit(15)->get();

        return view('admin.dashboard', compact([
            'companiesCount','driversCount','advertisingsCount','lastDisplays'
        ]));
    }
    
}
