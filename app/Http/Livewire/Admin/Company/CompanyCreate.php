<?php

namespace App\Http\Livewire\Admin\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\CompanyAddress;

use Livewire\Component;
use WireUi\Traits\Actions;

class CompanyCreate extends Component
{
    use Actions;

    public $user_id, $segment_id, $region, $fantasy_name, $corporate_name, $cnpj;
    public $street_name, $number, $complement, $zipcode, $district, $city;

    protected $rules = [
        'user_id' => 'nullable|integer',
        'segment_id' => 'required|integer',
        'fantasy_name' => 'required',
        'corporate_name' => 'required',
        'cnpj' => 'required|integer',
        'street_name' => 'required',
        'number' => 'required',
        'zipcode' => 'required|integer',
        'district' => 'required',
        'city' => 'required',
    ];

    protected $validationAttributes = [
        'segment_id' => 'Segmento',
        'fantasy_name' => 'Nome Fantasia',
        'corporate_name' => 'Razão Social',
        'street_name' => 'Endereço',
        'number' => 'Número',
        'district' => 'Bairro',
        'city' => 'Cidade',
    ];

    protected $messages = [
        'cnpj.required' => 'O campo CNPJ é obrigatório.',
        'zipcode.required' => 'O campo CEP é obrigatório.',
    ];

    public function save() {
        $this->validate();

        DB::beginTransaction();
        try {
            $company = Company::create([
                'user_id' => $this->user_id,
                'segment_id' => $this->segment_id,
                'region' => 'CWB',
                'fantasy_name' => $this->fantasy_name,
                'corporate_name' => $this->corporate_name,
                'cnpj' => $this->cnpj,
            ]);
            if($company) {
                $address = $company->address()->create([
                    'street_name' => $this->street_name,
                    'number' => $this->number,
                    'complement' => $this->complement,
                    'zipcode' => $this->zipcode,
                    'district' => $this->district,
                    'city' => $this->city,
                    'state' => 'PR',
                ]);
            }
        } catch (\Throwable $th) {
            $this->dialog([
                'title'       => 'Erro!',
                'description' => 'Erro ao salvar empresa.',
                'icon'        => 'error'
            ]);
        }

        if($company && $address) {
            DB::commit();
            $this->dialog([
                'title'       => 'Concluído!',
                'description' => 'Empresa salva com sucesso.',
                'icon'        => 'success'
            ]);
            // REDIRECIONAR
        } else {
            DB::rollBack();
            $this->dialog([
                'title'       => 'Erro!',
                'description' => 'Erro ao salvar empresa.',
                'icon'        => 'error'
            ]);
        }
    }
    
    public function render()
    {
        $this->segment_id = '3';
        $this->fantasy_name = 'Jockah\'s Barber';
        $this->corporate_name = 'Josias S.A';
        $this->cnpj = '12345678910';
        $this->street_name = 'Rua Jorge Gava';
        $this->number = '952';
        $this->zipcode = '82110250';
        $this->district = 'Pilarzinho';
        $this->city = 'Curitiba';


        return view('livewire.admin.company.create');
    }
}
