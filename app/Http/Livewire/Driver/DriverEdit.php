<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Driver;

class DriverEdit extends Component
{
    use Actions;

    public $driver;
    public $name, $cpf;

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        $this->name = $driver->name;
        $this->cpf = $driver->cpf;
    }

    protected $validationAttributes = [
        'name' => 'Nome',
        'cpf' => 'CPF',
    ];

    public function saveDriver() {
        $validatedDriver = $this->validate([
            'name' => 'required|string|min:3|max:180',
            'cpf' => 'required|string|size:11',
        ]);
        try {
            $this->driver->update($validatedDriver);
            $this->dialog([
                'title' => 'Sucesso!','description'=>'Motorista atualizado com sucesso.','icon'=>'success'
            ]);
        } catch (\Throwable $th) {
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao atualizar motorista.','icon'=>'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.driver.edit');
    }
}
