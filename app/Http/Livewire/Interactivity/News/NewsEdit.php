<?php

namespace App\Http\Livewire\Interactivity\News;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\News;
use App\Models\Category;

class NewsEdit extends Component
{
    use Actions;

    public $news;
    public $title, $category_id, $date, $source, $url;
    public $categories, $category_title;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'title' => 'Título da notícia',
        'category_id' => 'Categoria',
        'date' => 'Data',
        'source' => 'Origem',
        'url' => 'URL (link)',
        'thumbnail' => 'Thumbnail (imagem)',
    ];

    public function mount(News $news)
    {
        $this->news = $news;
        $this->category_id = $news->category_id;
        $this->title = $news->title;
        $this->date = $news->date;
        $this->source = $news->source;
        $this->url = $news->url;
    }

    public function render()
    {
        $this->categories = Category::where('type', 'news')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.news.news-edit')->layout('layouts.interactivity');
    }

    public function saveNews() {
        $this->date = \Carbon\Carbon::parse($this->date)->format('Y-m-d');
        $validatedNews = $this->validate([
            'title' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|min:1',
            'date' => 'required|date|after:yesterday',
            'source' => 'nullable|string|max:48',
            'url' => 'nullable|url',
        ]);
        try {
            $this->news->update($validatedNews);
            $this->dialog(['description'=>'Notícia atualizada com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog([ 'description'=>'Ocorreu um erro ao atualizar notícia.','icon'=>'error']);
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
