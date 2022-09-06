<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informative;

class InformativeController extends Controller
{
    public function index()
    {
        $informatives = Informative::
        with(['category','image','video'])
        // ativo
        // data da expiração
        ->where('type', 'IMAGE')
        ->whereHas('image')
        ->orWhereHas('video')
        ->inRandomOrder()
        ->first();

        return $informatives;
    }
}
