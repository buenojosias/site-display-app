<?php

namespace App\Http\Livewire\Admin\Company;

use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\CompanyAddress;
use Livewire\Component;
use WireUi\Traits\Actions;

class CompanyCreate extends Component
{

    // ESTE COMPONENTE SERÁ EXCLUÍDO
    
    
    
    public $street_name, $number, $complement, $zipcode, $district, $city;
    
    public $user_id;

    /*protected $rules = [
        'user_id' => 'nullable|integer',
        
        
        'street_name' => 'required',
        'number' => 'required',
        'zipcode' => 'required|integer',
        'district' => 'required',
        'city' => 'required',
    ];*/

    /*protected $validationAttributes = [
        'segment_id' => 'Segmento',
        'fantasy_name' => 'Nome Fantasia',
        'corporate_name' => 'Razão Social',
        'street_name' => 'Endereço',
        'number' => 'Número',
        'district' => 'Bairro',
        'city' => 'Cidade',
    ];*/

    public function saveCompany() {
    
        
/*
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
*/
    }
    
    public function render()
    {
        return view('admin.company.create')->layout('layouts.formside');
    }
}
