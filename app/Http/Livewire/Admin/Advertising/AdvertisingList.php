<?php

namespace App\Http\Livewire\Admin\Advertising;

use Livewire\Component;
use App\Models\Advertising;

class AdvertisingList extends Component
{
    public $search = null;
    public $status = null;

    public function filterStatus($active) {
        $this->status = $active;
    }

    public function render()
    {
        $advertisings = Advertising::with('company')
        ->when($this->search, function($query){
            return $query->where('title', 'LIKE', "%$this->search%");
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('admin.advertising.list', ['advertisings' => $advertisings]);
    }
}
