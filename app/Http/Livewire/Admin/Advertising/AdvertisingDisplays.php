<?php

namespace App\Http\Livewire\Admin\Advertising;

use Livewire\Component;
use App\Models\Display;

class AdvertisingDisplays extends Component
{
    public $advertising;
    public $date;

    public function mount($advertising) {
        $this->advertising = $advertising;
    }

    public function render()
    {
        $displays = Display::where('advertising_id', $this->advertising->id)
        ->with('driver')
        ->when($this->date, function($query){
            return $query->whereDate('datetime', '=', \Carbon\Carbon::parse($this->date)->format('Y-m-d'))
                        ->orderBy('datetime', 'asc');
        })
        ->orderBy('datetime', 'desc')
        ->paginate();

        return view('admin.advertising.displays-livewire', ['displays' => $displays]);
    }
}
