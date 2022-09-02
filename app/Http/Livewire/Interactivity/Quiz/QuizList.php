<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;

class QuizList extends Component
{
    public function render()
    {
        return view('livewire.interactivity.quiz.list')->layout('layouts.interactivity');
    }
}
