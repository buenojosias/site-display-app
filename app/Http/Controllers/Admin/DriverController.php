<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;

class DriverController extends Controller
{
    public function show(Driver $driver)
    {
        $user = $driver->user;
        $address = $driver->address;
        $vehicle = $driver->vehicle;
        return view('admin.driver.show', compact(['driver','user','address','vehicle']));
    }

    public function displays(Driver $driver)
    {
        return view('admin.driver.displays', compact('driver'));
    }
}
