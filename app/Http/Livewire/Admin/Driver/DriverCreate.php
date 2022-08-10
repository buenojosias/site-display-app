<?php

namespace App\Http\Livewire\Admin\Driver;

use Livewire\Component;

class DriverCreate extends Component
{

    public $name, $cpf;
    public function render()
    {
        return view('livewire.admin.driver.create');
    }
}
