<?php

namespace App\Http\Livewire\Interactivity;

use Livewire\Component;

class InteractivityHome extends Component
{
    public function render()
    {
        return view('livewire.interactivity.home')->layout('layouts.interactivity');
    }
}
