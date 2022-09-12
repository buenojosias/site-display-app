<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Category;
use App\Models\Quiz;

class QuizEdit extends Component
{
    use Actions;

    public $quiz;
    public $category_id, $question, $type, $registrable, $active;
    public $categories, $category_title;
    public $alternatives;
    public $alternative;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'question' => 'Pergunta',
        'category_id' => 'Categoria',
        'type' => 'Tipo de pergunta',
        'registrable' => 'Registrável',
        'active' => 'Ativo',
        'alternative.answer' => 'Resposta',
    ];

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->question = $quiz->question;
        $this->category_id = $quiz->category_id;
        $this->type = $quiz->type;
        $this->registrable = $quiz->registrable;
        $this->active = $quiz->active;
        $this->correct = false;
        // $this->fill([
        //     'alternatives' => collect($this->quiz->alternatives),
        // ]);
    }

    public function render()
    {
        $this->alternatives = $this->quiz->alternatives()->get();
        $this->categories = Category::where('type', 'quiz')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.quiz.edit')->layout('layouts.interactivity');
    }

    public function saveQuiz()
    {
        $validatedQuiz = $this->validate([
            'question' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|min:1',
            'type' => 'required|in:TEST,SURVEY',
            'registrable' => 'boolean',
            'active' => 'boolean',
        ]);
        try {
            $this->quiz->update($validatedQuiz);
            $this->dialog(['description'=>'Pergunta atualizada com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao atualizar pergunta.','icon'=>'error']);
        }
    }

    public function editAlternative($alternative) {
        $this->alternative = $alternative;
    }

    public function addAlternative() {
        $this->alternative = [
            'id' => '',
            'answer' => '',
            'correct' => false
        ];
    }

    public function storeAlternative()
    {
        $validateAlternative = $this->validate([
            'alternative.answer' => 'required|string|min:3|max:100',
            'alternative.correct' => 'nullable|boolean',
        ]);
        try {
            $alternative = $this->quiz->alternatives()->create($this->alternative);
            $this->dialog(['description'=>'Alternativa salva com sucesso.','icon'=>'success']);
            $this->clearAlternative();
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar alternativa.','icon'=>'error']);
            dd($th);
        }
    }

    public function updateAlternative()
    {
        $validateAlternative = $this->validate([
            'alternative.answer' => 'required|string|min:3|max:100',
            'alternative.correct' => 'nullable|boolean',
        ]);
        try {
            $this->quiz->alternatives()->findOrFail($this->alternative['id'])->update($this->alternative);
            $this->dialog(['description'=>'Alternativa salva com sucesso.','icon'=>'success']);
            $this->clearAlternative();
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar alternativa.','icon'=>'error']);
            dd($th);
        }
    }

    public function clearAlternative() {
        $this->alternative = '';
    }

    public function removeAlternative($id) {
        try {
            $this->quiz->alternatives->find($id)->delete();
            $this->clearAlternative();
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao remover a alternativa.','icon'=>'error']);
            dd($th);
        }
    }

    public function saveCategory() {
        $validatedCategory = $this->validate([
            'category_title' => 'required|string|min:3|max:64',
        ]);
        try {
            Category::create([
                'title' => $this->category_title,
                'type' => 'informative'
            ]);
            $this->category_title = '';
        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
