<?php

namespace App\Http\Livewire\Interactivity\Informative;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Informative;
use App\Models\Category;

class InformativeEdit extends Component
{
    use Actions;

    public $title, $category_id, $type, $url, $active, $expires_at;
    public $categories, $category_title;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'title' => 'Título do informativo',
        'category_id' => 'Categoria',
        'type' => 'Tipo de mídia',
        'url' => 'URL',
        'active' => 'Ativo',
        'expires_at' => 'Expiração',
    ];

    public function mount(Informative $informative)
    {
        $this->informative = $informative;
        $this->category_id = $informative->category_id;
        $this->type = $informative->type;
        $this->title = $informative->title;
        $this->expires_at = $informative->expires_at;
        $this->active = $informative->active;
        $this->url = $informative->url;
    }

    public function render()
    {
        $this->categories = Category::where('type', 'informative')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.informative.edit')->layout('layouts.interactivity');
    }

    public function saveInformative()
    {
        $validatedInformative = $this->validate([
            'title' => 'required|string|min:5|max:100',
            'category_id' => 'required|integer|min:1',
            'type' => 'required|in:VIDEO,IMAGE,TEXT',
            'url' => 'nullable|url',
            'active' => 'required|boolean',
            'expires_at' => 'required|date|after:now',
        ]);
        try {
            $this->informative->update($validatedInformative);
            $this->dialog(['description'=>'Informativo atualizado com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog([ 'description'=>'Ocorreu um erro ao atualizar o informativo.','icon'=>'error']);
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
