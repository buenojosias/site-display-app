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
    public $segment = null;
    public $segments = [];

    public function setSegment($idseg) {
        $this->segment = $idseg;
    }

    public function mount() {
        $this->segments = Segment::orderBy('title', 'asc')->get();
    }

    public function render()
    {
        $segments = $this->segments;
        $companies = Company::
        when($this->search, function($query){
            return $query->where('fantasy_name', 'LIKE', "%$this->search%");
        })
        ->when($this->segment, function($query){
            return $query->where('segment_id', $this->segment);
        })
        ->orderBy('fantasy_name','asc')
        ->paginate(10);

        return view('livewire.admin.company.company-list', compact(['companies','segments']));
    }
}
