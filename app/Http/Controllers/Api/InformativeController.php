<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informative;

class InformativeController extends Controller
{
    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $informatives = Informative::
        with(['category','image','video'])
        ->where('active', 1)
        ->where('type', 'IMAGE')
        ->where('expires_at', '>=', $now)
        ->whereHas('image')
        //->orWhereHas('video')
        ->inRandomOrder()
        ->first();

        return $informatives;
    }
}
