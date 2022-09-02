<?php

namespace App\Http\Livewire\Interactivity\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\News;

class NewsCreate extends Component
{
    use WithFileUploads;
    use Actions;

    public $categories, $category_title, $title, $category_id, $date, $source, $url;
    public $thumbnail;
    public $validThumbnail;
    private $filename;
    private $path;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'title' => 'Título da notícia',
        'category_id' => 'Categoria',
        'date' => 'Data',
        'source' => 'Origem',
        'url' => 'URL (link)',
        'thumbnail' => 'Thumbnail (imagem)',
    ];

    public function render()
    {
        $this->date = date('Y-m-d');
        $this->categories = Category::where('type', 'news')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.news.news-create')->layout('layouts.interactivity');
    }

    public function updated() {
        $this->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg,jpeg,webp|max:3072',
        ]);
        $this->validThumbnail = $this->thumbnail;
    }

   public function saveNews() {
        $validatedNews = $this->validate([
            'title' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|min:1',
            'date' => 'required|date|after:yesterday',
            'source' => 'nullable|string|max:48',
            'url' => 'nullable|url',
            'thumbnail' => 'required|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        try {
            $this->filename = $this->thumbnail->store('midias/news', 's3');
            $this->path = Storage::disk('s3')->url($this->filename);
        } catch (\Throwable $th) {
            $this->dialog(['description' => 'Ocorreu um erro ao salvar a imagem.','icon'=>'error']);
            dd($th);
        }

        DB::beginTransaction();
        try {
            $news = News::create($validatedNews);
            $image = $news->thumbnail()->create(['filename' => $this->filename, 'path' => $this->path]);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar a notícia.','icon'=>'error']);
        }
        if(@$news && @$image) {
            DB::commit();
            return redirect()->route('admin.interactivity.news.list')->with('success','Notícia salva com sucesso!');
        } else {
            DB::rollBack();
            Storage::disk('s3')->delete($this->filename);
            $this->dialog(['description'=>'Ocorreu um erro ao salvar a notícia.','icon'=>'error']);
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

}
