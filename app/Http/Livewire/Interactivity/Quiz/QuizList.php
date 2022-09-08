<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;
use App\Models\Quiz;

class QuizList extends Component
{
    use Actions;

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

    public function deleteOne($id) {
        $quiz = Quiz::with(['thumbnail','alternatives'])->findOrFail($id);
        if($quiz->thumbnail) {
            try {
                Storage::disk('s3')->delete($quiz->thumbnail->filename);
                $quiz->thumbnail->delete();
            } catch (\Throwable $th) {
                $this->dialog(['description'=>'Ocorreu um erro ao excluir a imagem.','icon'=>'error']);
                dd($th);
            }
        }

        try {
            $quiz->delete();
            $this->dialog(['description'=>'Pergunta excluída com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao excluir a pergunta.','icon'=>'error']);
            dd($th);
        }
    }

}
