<?php

namespace App\Http\Livewire\Interactivity\News;

use Livewire\Component;
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
        $n = News::findOrFail($id);
        try {
            $n->delete();
            $this->dialog(['title' => 'Sucesso!','description'=>'Notícia removida com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog(['title' => 'Erro!','description'=>'Erro ao remover notícia.','icon'=>'error']);
            dd($th);
        }
    }
}
