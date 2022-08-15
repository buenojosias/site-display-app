<?php

namespace App\Http\Livewire\Admin\Company;

use Livewire\Component;
use App\Models\Advertising;

class CompanyAdvertisings extends Component
{
    public $advertisings;

    public function mount($company)
    {
        $this->advertisings = Advertising::where('company_id', $company->id)->withCount('displays')->get();
    }

    public function render()
    {
        return view('livewire.admin.company.advertisings', ['advertisings' => $this->advertisings]);
    }
}
