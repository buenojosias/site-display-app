<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class RecordController extends Controller
{
    public function index($secao = null) {
        return view('admin.record.index', compact('secao'));
    }
}