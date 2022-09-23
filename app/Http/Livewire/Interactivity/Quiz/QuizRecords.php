<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;
use App\Models\QuizRecord;

class QuizRecords extends Component
{
    public $date;

    public function render()
    {
        $records = QuizRecord::
        with(['quiz','alternativ','driver'])
        ->when($this->date, function($query){
            return $query->whereDate('created_at', '=', \Carbon\Carbon::parse($this->date)->format('Y-m-d'))
                        ->orderBy('id', 'desc');
        })
        ->orderBy('id', 'desc')
        ->paginate();


        return view('livewire.interactivity.quiz.records', ['records' => $records])->layout('layouts.interactivity');
    }
}
