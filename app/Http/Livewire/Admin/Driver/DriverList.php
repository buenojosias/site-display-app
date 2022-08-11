<?php

namespace App\Http\Livewire\Admin\Driver;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Driver;

class DriverList extends Component
{
    use WithPagination;

    public $search = null;
    public $status = null;
    public $working = null;

    public function filterStatus($active) {
        $this->status = $active;
    }
    
    public function filterWorking($wrk) {
        $this->working = $wrk;
    }
    
    public function render()
    {
        $drivers = Driver::with('user')
        ->when($this->search, function($query){
            return $query->where('name', 'LIKE', "%$this->search%");
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->when($this->working, function($query){
            return $query->where('working', $this->working);
        })
        ->orderBy('name','asc')
        ->paginate(10);

        return view('admin.driver.list', compact('drivers'));
    }
}
