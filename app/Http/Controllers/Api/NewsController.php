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
        $news = News::where('date', $today)->with(['category','thumbnail'])->get();
        return $news;
    }
}
