<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanyCreate extends Component
{
    use WithFileUploads;
    use Actions;

    public $segment_id, $fantasy_name, $corporate_name, $cnpj;
    public $region = 'CWB';
    public $logo;
    public $validLogo;
    public $path;
    public $default_cost;

    public function updated() {
        $this->validate([
            'logo' => 'mimes:mimes:jpeg,png,jpg,jpeg|max:3072',
        ]);
        $this->validLogo = $this->logo;
    }
    
    public function saveCompany() {
        $validatedCompany = $this->validate([
            'segment_id' => 'required|integer|min:1',
            'fantasy_name' => 'required|string|min:3|max:180',
            'corporate_name' => 'required|string|min:5|max:180',
            'cnpj' => 'required|string|size:14|unique:companies',
            'region' => 'required|string|size:3',
            'logo' => 'nullable|mimes:mimes:jpeg,png,jpg,jpeg|max:3072',
            'default_cost' => 'required|integer|min:0|max:99',
        ]);

        if($this->logo) {
            $this->logo->store('logos');
        }
        
        DB::beginTransaction();
        try {
            $company = Company::create($validatedCompany);
            $balance = $company->balance()->create();
        } catch (\Throwable $th) {
            dd($th);
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao cadastrar empresa.','icon'=>'error'
            ]);
        }
        if($company && $balance) {
            DB::commit();
            return redirect()->route('admin.companies.edit', $company)->with('success','Empresa cadastrada com sucesso!');
        } else {
            DB::rollBack();
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao cadastrar empresa.','icon'=>'error'
            ]);
        }
    }

    protected $validationAttributes = [
        'segment_id' => 'Segmento',
        'fantasy_name' => 'Nome Fantasia',
        'cnpj' => 'CNPJ',
        'corporate_name' => 'Razão Social',
        'logo' => 'Logomarca',
        'default_cost' => 'Custo padrão'
    ];

    public function render()
    {
        return view('livewire.company.create')->layout('layouts.formside');
    }
}
