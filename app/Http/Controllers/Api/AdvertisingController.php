<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Models\Company;

class AdvertisingController extends Controller
{
    public function index($region = 'CWB')
    {
        // $advertisings = Company::
        // with(['advertisings.video','links'])
        // ->limit(6)
        // ->get();

        
        $advertisings = Advertising::
            where('active', 1)
            ->whereHas('video')
            ->with('video')
            ->with(['company.links' => function($query){
            //$query->with('links'); //->where('active', 1)
            }])
            ->limit(10)->get();
            // ->first();

        foreach($advertisings as $advertising) {
            $advertising->balance = 50;
        }
        return $advertisings;
    }
}
