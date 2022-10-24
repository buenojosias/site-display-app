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
        
        foreach($news as $n) {
            $n['url'] = $n['url'] != null ? env('APP_URL').'/app/redir?model=news&id='.$n['id'] : null;
        }
        
        return $news;
    }
}
