<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Company;

class CompanyEdit extends Component
{
    use Actions;

    public $company;
    public $segment_id, $fantasy_name, $corporate_name, $cnpj;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->segment_id = $company->segment_id;
        $this->fantasy_name = $company->fantasy_name;
        $this->corporate_name = $company->corporate_name;
        $this->cnpj = $company->cnpj;
    }

    public function saveCompany() {
        $validatedCompany = $this->validate([
            'segment_id' => 'required|integer|min:1',
            'fantasy_name' => 'required|string|min:3|max:180',
            'corporate_name' => 'required|string|min:5|max:180',
        ]);

        try {
            $this->company->update($validatedCompany);
            $this->dialog(['description'=>'Empresa atualizada com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog([ 'description'=>'Ocorreu um erro ao atualizar empresa.','icon'=>'error']);
        }
    }

    protected $validationAttributes = [
        'segment_id' => 'Segmento',
        'fantasy_name' => 'Nome Fantasia',
        'cnpj' => 'CNPJ',
        'corporate_name' => 'Razão Social',
        'logo' => 'Logomarca',
    ];

    public function render()
    {
        return view('livewire.company.edit');
    }
}
