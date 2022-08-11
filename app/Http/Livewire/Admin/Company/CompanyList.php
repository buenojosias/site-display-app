<?php

namespace App\Http\Livewire\Admin\Company;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use App\Models\Segment;

class CompanyList extends Component
{
    use WithPagination;

    public $search = null;
    public $status = null;
    public $segment = null;
    public $segments = [];

    public function filterSegment($idseg) {
        $this->segment = $idseg;
    }

    public function filterStatus($active) {
        $this->status = $active;
    }

    public function mount() {
        $this->segments = Segment::orderBy('title', 'asc')->get();
    }

    public function render()
    {
        $segments = $this->segments;
        $companies = Company::with('user','segment')
        ->when($this->search, function($query){
            return $query->where('fantasy_name', 'LIKE', "%$this->search%");
        })
        ->when($this->segment, function($query){
            return $query->where('segment_id', $this->segment);
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->orderBy('fantasy_name','asc')
        ->paginate(10);

        return view('admin.company.list', compact(['companies','segments']));
    }
}
