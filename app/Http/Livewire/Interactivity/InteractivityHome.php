<?php

namespace App\Http\Livewire\Interactivity;

use Livewire\Component;
use App\Models\{ Informative, News, Quiz };

class InteractivityHome extends Component
{
    public function render()
    {
        $informativesCount = Informative::where('active', true)->where('expires_at', '>', now())->count();
        $newsCount = News::where('date', '>=', date('Ymd'))->count();
        $quizzesCount = Quiz::where('active', true)->count();

        return view('livewire.interactivity.home', compact(['informativesCount','newsCount','quizzesCount']))->layout('layouts.interactivity');
    }
}
