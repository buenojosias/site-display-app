<?php

namespace App\Http\Livewire\Admin\Driver;

use Livewire\Component;
use App\Models\Display;

class DriverDisplays extends Component
{
    public $driver;
    public $date;

    public function mount($driver) {
        $this->driver = $driver;
    }

    public function render()
    {
        $displays = Display::where('driver_id', $this->driver->id)
        ->with('advertising.company')
        ->when($this->date, function($query){
            return $query->whereDate('datetime', '=', \Carbon\Carbon::parse($this->date)->format('Y-m-d'))
                        ->orderBy('datetime', 'asc');
        })
        ->orderBy('datetime', 'desc')
        ->paginate();

        return view('admin.driver.displays-livewire', ['displays' => $displays]);
    }
}
