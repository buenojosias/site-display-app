<?php

namespace App\Http\Livewire\Interactivity\News;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;
use App\Models\News;

class NewsList extends Component
{
    use Actions;

    public $news;

    public function render()
    {
        $this->news = News::with(['category','thumbnail'])->get();//where('date', Date('Ymd'))->
        return view('livewire.interactivity.news.news-list')->layout('layouts.interactivity');
    }

    public function deleteOne($id) {
        $news = News::with('thumbnail')->findOrFail($id);
        if($news->thumbnail) {
            try {
                Storage::disk('s3')->delete($news->thumbnail->filename);
                $news->thumbnail->delete();
            } catch (\Throwable $th) {
                $this->dialog(['description'=>'Ocorreu um erro ao excluir a imagem.','icon'=>'error']);
                dd($th);
            }
        }

        try {
            $news->delete();
            $this->dialog(['description'=>'Notícia excluída com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao excluir a notícia.','icon'=>'error']);
            dd($th);
        }
    }
}
