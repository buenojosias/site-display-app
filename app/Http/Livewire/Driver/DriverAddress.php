<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Driver;

class DriverAddress extends Component
{
    use Actions;

    public $driver;
    public $address;
    public $street_name, $number, $complement, $zipcode, $district, $city;
    public $state = "PR";

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        if($address = $driver->address()->first()) {
            $this->address = $address;
            $this->street_name = $address->street_name;
            $this->number = $address->number;
            $this->complement = $address->complement;
            $this->zipcode = $address->zipcode;
            $this->district = $address->district;
            $this->city = $address->city;
        }
    }

    protected $validationAttributes = [
        'street_name' => 'Endereço',
        'number' => 'Número',
        'complement' => 'Complento',
        'zipcode' => 'CEP',
        'district' => 'Bairro',
        'city' => 'Cidade',
    ];

    public function saveAddress()
    {
        $validatedAddress = $this->validate([
            'street_name' => 'required|string|min:5|max:100',
            'number' => 'required|string|max:20',
            'complement' => 'nullable|string|max:30',
            'zipcode' => 'required|string|size:8',
            'district' => 'required|string|min:3|max:50',
            'city' => 'required|string|min:3|max:50',
            'state' => 'required|string|size:2',
        ]);
        
        if($this->address) {
            try {
                $this->address->update($validatedAddress);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Endereço salvo com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar endereço.','icon'=>'error'
                ]);
            };
        } else {
            try {
                $this->address = $this->driver->address()->create($validatedAddress);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Endereço salvo com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar endereço.','icon'=>'error'
                ]);
            };
        }
    }

    public function render()
    {
        return view('livewire.driver.driver-address');
    }
}
