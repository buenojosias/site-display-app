<?php

namespace App\Http\Livewire\Admin\Record;

use Livewire\Component;

class RecordDriverItem extends Component
{
    public function render($driver)
    {
        dd($driver);
        return view('admin.record.driver-item');
    }
}
