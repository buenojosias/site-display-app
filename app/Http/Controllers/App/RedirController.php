<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedirController extends Controller
{
    public function __invoke(Request $request)
    {
        $modelName = '\\App\Models\\' . Str::ucfirst($request->model);
        $this->model = new $modelName;
        $data = $this->model->findOrFail($request->id);

        $data->accesses()->create(['driver_id' => $request->driver]);
        return redirect()->to($data->url);
        // http://displayapp.local/app/redir?model=news&id=1
    }
}
