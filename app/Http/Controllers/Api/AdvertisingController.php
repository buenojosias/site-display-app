<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Models\Company;
use App\Models\Display;

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
            ->with('company.links')
            ->limit(6)->get();
        foreach($advertisings as $advertising) {
            $advertising->link = $advertising->company->links ? env('APP_URL').'/c/'.$advertising->company->links->slug : NULL;
            $advertising->balance = 50;
        }
        return $advertisings;
    }

    public function registerDisplay(Request $request) {
        //return $request->all();
        $validator = Validator::make($request->only(['id','advertising_id','driver_id','datetime','latitude','longitude','cost']), [
            'id' => 'required|uuid',
            'advertising_id' => 'required|numeric',
            'driver_id' => 'nullable|numeric',
            'datetime' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);
        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        
        try {
            Display::create($request->all());
            return response()->json(["status" => "success"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", "message" => $th]);
        }

        return $request;
    }
}
