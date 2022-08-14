<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    public function show(Advertising $advertising)
    {
        return view('admin.advertising.show');
    }

    public function displays(Advertising $advertising)
    {
        return view('admin.advertising.displays', compact('advertising'));
    }
}
