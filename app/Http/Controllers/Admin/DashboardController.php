<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Company, Driver, Advertising };

class DashboardController extends Controller
{
    public function index()
    {
        $companiesCount = Company::count();
        $driversCount = Driver::count();
        $advertisingsCount = Advertising::count();

        return view('admin.dashboard', compact([
            'companiesCount','driversCount','advertisingsCount'
        ]));
    }
    
}
