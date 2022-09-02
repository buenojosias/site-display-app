<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Company;

class CompanySettings extends Component
{
    use Actions;

    public $company;
    public $default_cost, $daily_limit;

    public function mount(Company $company) {
        $this->company = $company;
        $this->default_cost = $company->default_cost;
        $this->daily_limit = $company->daily_limit;
    }

    public function render()
    {
        return view('livewire.company.settings');
    }

    public function saveSettings() {
        $validatedCompany = $this->validate([
            'default_cost' => 'required|numeric|min:0|max:100',
            'daily_limit' => 'required|numeric|min:10',
        ]);

        try {
            $this->company->update($validatedCompany);
            $this->dialog(['description'=>'Alterações alvas com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog([ 'description'=>'Ocorreu um erro ao salvar as alterações.','icon'=>'error']);
        }
    }

    protected $validationAttributes = [
        'default_cost' => 'Custo padrão',
        'daily_limit' => 'Limite diário',
    ];    

}
