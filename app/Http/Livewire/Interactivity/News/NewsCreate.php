<?php

namespace App\Http\Livewire\Interactivity\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\News;

class NewsCreate extends Component
{
    use WithFileUploads;
    use Actions;

    public $categories;
    public $category_title;
    public $title;
    public $category_id;
    public $date;
    public $source;
    public $url;
    public $thumbnail;
    public $validThumbnail;
    private $updatedThumbnail;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'title' => 'Título da notícia',
        'category_id' => 'Categoria',
        'date' => 'Data',
        'source' => 'Origem',
        'url' => 'URL (link)',
        'thumbnail' => 'Thumbnail (imagem)'
    ];

    public function render()
    {
        $this->date = date('Y-m-d');
        $this->categories = Category::where('type', 'news')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.news.news-create')->layout('layouts.interactivity');
    }

    public function saveNews() {
        $validatedNews = $this->validate([
            'title' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|min:1',
            'date' => 'required|date|after:yesterday',
            'source' => 'nullable|string|max:48',
            'url' => 'nullable|url',
            'thumbnail' => 'required|mimes:mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        try {
            $this->updatedThumbnail = env('APP_URL').'/'.$this->thumbnail->store('midias/news');
        } catch (\Throwable $th) {
            dd($th);
        }

        DB::beginTransaction();
        try {
            $news = News::create($validatedNews);
            $image = $news->thumbnail()->create(['path' => $this->updatedThumbnail]);
        } catch (\Throwable $th) {
            dd($th);
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar a notícia.','icon'=>'error'
            ]);
        }
        if($news && $image) {
            DB::commit();
            return redirect()->route('admin.interactivity.news.list')->with('success','Notícia salva com sucesso!');
        } else {
            DB::rollBack();
            $this->dialog([
                'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar a notícia.','icon'=>'error'
            ]);
        }
        
    }

    public function saveCategory() {
        $validatedCategory = $this->validate([
            'category_title' => 'required|string|min:3|max:64',
        ]);
        try {
            Category::create([
                'title' => $this->category_title,
                'type' => 'news'
            ]);
            $this->category_title = '';
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updated() {
        $this->validate([
            'thumbnail' => 'mimes:mimes:jpeg,png,jpg,webp|max:3072',
        ]);
        $this->validThumbnail = $this->thumbnail;
    }

}
