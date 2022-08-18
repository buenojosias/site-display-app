<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;

class DriverCreate extends Component
{
    use Actions;

    public $name, $cpf;
    public $region = 'CWB';

    protected $validationAttributes = [
        'name' => 'Nome',
        'cpf' => 'CPF',
    ];

    public function saveDriver() {
        $validatedDriver = $this->validate([
            'name' => 'required|string|min:3|max:180',
            'cpf' => 'required|string|size:11|unique:drivers',
            'region' => 'required|string|size:3',
        ]);
        DB::beginTransaction();
        try {
            $driver = Driver::create($validatedDriver);
            // Criar financeiro
        } catch (\Throwable $th) {
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao cadastrar motorista.','icon'=>'error'
            ]);
        }
        if($driver) {
            DB::commit();
            return redirect()->route('admin.drivers.edit', $driver)->with('success','Motorista cadastrato com sucesso!');
        } else {
            DB::rollBack();
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao cadastrar motorista.','icon'=>'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.driver.create')->layout('layouts.formside');
    }
}
