<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Quiz;

class QuizList extends Component
{
    public $search = null;
    public $type = null;
    public $status = null;

    public function filterStatus($active) {
        $this->status = $active;
    }

    public function filterType($type) {
        $this->type = $type;
    }

    public function render()
    {
        $quizzes = Quiz::
        when($this->search, function($query){
            return $query->where('question', 'LIKE', "%$this->search%");
        })
        ->when($this->type, function($query){
            return $query->where('type', $this->type);
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->with('category')
        ->orderBy('created_at','desc')
        ->paginate();

        return view('livewire.interactivity.quiz.list', ['quizzes' => $quizzes])->layout('layouts.interactivity');
    }
}
