<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Driver;

class DriverVehicle extends Component
{
    use Actions;

    public $driver;
    public $vehicle;
    public $brand, $model, $color, $year, $license_plate;

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        if($vehicle = $driver->vehicle()->first()) {
            $this->vehicle = $vehicle;
            $this->brand = $vehicle->brand;
            $this->model = $vehicle->model;
            $this->color = $vehicle->color;
            $this->year = $vehicle->year;
            $this->license_plate = $vehicle->license_plate;
        }
    }
    
    protected $validationAttributes = [
        'brand' => 'Marca (fabricante)',
        'model' => 'Modelo',
        'color' => 'Cor',
        'year' => 'Ano',
        'license_plate' => 'Placa',
    ];

    public function saveVehicle()
    {
        $validatedVehicle = $this->validate([
            'brand' => 'required|string|min:3|max:24',
            'model' => 'required|string|min:3|max:32',
            'color' => 'required|string|min:3|max:24',
            'year' => 'required|integer|digits:4|min:2014|max:'.(date('Y')+1),
            'license_plate' => 'nullable|string|min:7|max:8',
        ]);
        
        if($this->vehicle) {
            try {
                $this->vehicle->update($validatedVehicle);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Veículo salvo com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar veículo.','icon'=>'error'
                ]);
            };
        } else {
            try {
                $this->vehicle = $this->driver->vehicle()->create($validatedVehicle);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Veículo salvo com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar veículo.','icon'=>'error'
                ]);
            };
        }
    }

    public function render()
    {
        return view('livewire.driver.vehicle');
    }
}
