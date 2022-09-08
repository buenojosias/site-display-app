<?php

namespace App\Http\Livewire\Interactivity\Quiz;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Quiz;

class QuizCreate extends Component
{
    use WithFileUploads;
    use Actions;

    public $categories, $category_title, $category_id, $question, $type, $registrable = false, $active = true;
    public $alternatives = [];
    public $thumbnail;
    public $validThumbnail;
    private $filename;
    private $path;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'question' => 'Pergunta',
        'category_id' => 'Categoria',
        'type' => 'Tipo de pergunta',
        'registrable' => 'Registrável',
        'active' => 'Ativo',
        'alternatives.*.answer' => 'Alternativa'
    ];

    public function mount()
    {
        $this->fill([
            'alternatives' => collect([['answer' => '','correct' => false]]),
        ]);
    }

    public function render()
    {
        $this->categories = Category::where('type', 'quiz')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.quiz.create')->layout('layouts.interactivity');
    }

    public function updatedThumbnail() {
        $this->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg,webp|max:3072',
        ]);
        $this->validThumbnail = $this->thumbnail;
    }

    public function saveQuiz() {
        $validatedQuiz = $this->validate([
            'question' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|min:1',
            'type' => 'required|in:TEST,SURVEY',
            'registrable' => 'nullable|boolean',
            'active' => 'nullable|boolean',
            'thumbnail' => 'nullable|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $validateAlternatives = $this->validate([
            'alternatives.*.answer' => 'required|string|min:3|max:100',
            'alternatives.*.correct' => 'required|boolean',
        ]);

        if($this->thumbnail) {
            try {
                $this->filename = $this->thumbnail->store('midias/quizzes', 's3');
                $this->path = Storage::disk('s3')->url($this->filename);
            } catch (\Throwable $th) {
                $this->dialog(['description' => 'Ocorreu um erro ao salvar a thumb.','icon'=>'error']);
                dd($th);
            }
        }

        DB::beginTransaction();
        try {
            $quiz = Quiz::create($validatedQuiz);
            foreach($this->alternatives as $key => $alternative) {
                $quiz->alternatives()->create([
                    'answer' => $alternative['answer'],
                    'correct' => $alternative['correct'],
                ]);
            }
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar o quiz.','icon'=>'error']);
            dd($th);
        }

        if($quiz) {
            if($this->filename) { $quiz->thumbnail()->create(['filename' => $this->filename, 'path' => $this->path]); }
            DB::commit();
            return redirect()->route('admin.interactivity.quizzes.list')->with('success','Quiz salvo com sucesso!');
        } else {
            DB::rollBack();
            if($this->filename) { Storage::disk('s3')->delete($this->filename); }
            $this->dialog(['description'=>'Ocorreu um erro ao salvar o quiz.','icon'=>'error']);
        }
    }

    public function addAlternative()
    {
        $this->alternatives->push(['answer' => '','correct' => false]);
    }

    public function removeAlternative($key) {
        $this->alternatives->pull($key);
    }

    public function saveCategory() {
        $validatedCategory = $this->validate([
            'category_title' => 'required|string|min:3|max:64',
        ]);
        try {
            Category::create([
                'title' => $this->category_title,
                'type' => 'quiz'
            ]);
            $this->category_title = '';
        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
