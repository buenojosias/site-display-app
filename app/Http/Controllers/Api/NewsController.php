<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $news = News::
        with(['category','thumbnail'])
        ->where('date', '>=', $today)
        ->inRandomOrder()
        ->get();
        
        return $news;
    }
}
