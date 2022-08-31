<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    public function index($region = 'CWB')
    {
        $advertisings = Advertising::where('active', 1)->with(['company' => function($query){
            $query->whereHas('links')->with('links'); //->where('active', 1)
        }])->limit(6)->get();
        return $advertisings;
    }
}
