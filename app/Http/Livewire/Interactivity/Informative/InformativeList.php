<?php

namespace App\Http\Livewire\Interactivity\Informative;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Informative;

class InformativeList extends Component
{
    public $search = null;
    public $status = null;

    public function filterStatus($active) {
        $this->status = $active;
    }

    public function render()
    {
        $informatives = Informative::
        when($this->search, function($query){
            return $query->where('title', 'LIKE', "%$this->search%");
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->with('category')
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('livewire.interactivity.informative.list', ['informatives' => $informatives])->layout('layouts.interactivity');
    }
}
