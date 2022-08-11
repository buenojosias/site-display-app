<?php

namespace App\Http\Livewire\Admin\Driver;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Driver;
use WireUi\Traits\Actions;

class DriverCreate extends Component
{
    use Actions;

    public $name, $cpf;
    public $street_name, $number, $complement, $zipcode, $district, $city;

    protected $rules = [
        'name' => 'required',
        'cpf' => 'required|integer',
        'street_name' => 'required',
        'number' => 'required',
        'zipcode' => 'required|integer',
        'district' => 'required',
        'city' => 'required',
    ];

    protected $validationAttributes = [
        'name' => 'Nome',
        'street_name' => 'Endereço',
        'number' => 'Número',
        'district' => 'Bairro',
        'city' => 'Cidade',
    ];

    protected $messages = [
        //'cpf.required' => 'O campo CPF é obrigatório.',
        'zipcode.required' => 'O campo CEP é obrigatório.',
    ];

    public function save() {
        $this->validate();

        DB::beginTransaction();
        try {
            $driver = Driver::create([
                'region' => 'CWB',
                'name' => $this->name,
                'cpf' => $this->cpf,
            ]);
            if($driver) {
                $address = $driver->address()->create([
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
                'description' => 'Erro ao salvar motorista.',
                'icon'        => 'error'
            ]);
        }

        if($driver && $address) {
            DB::commit();
            $this->dialog([
                'title'       => 'Concluído!',
                'description' => 'Morotista salvo com sucesso.',
                'icon'        => 'success'
            ]);
            // REDIRECIONAR
        } else {
            DB::rollBack();
            $this->dialog([
                'title'       => 'Erro!',
                'description' => 'Erro ao salvar motorista.',
                'icon'        => 'error'
            ]);
        }
    }
    
    public function render()
    {
        return view('admin.driver.create');
    }
}
