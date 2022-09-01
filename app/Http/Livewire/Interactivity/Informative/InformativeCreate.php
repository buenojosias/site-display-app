<?php

namespace App\Http\Livewire\Interactivity\Informative;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Informative;

class InformativeCreate extends Component
{
    use Actions;
    use WithFileUploads;
    
    public $title, $expires_at, $video;
    public $validVideo;
    public $path;

    protected $validationAttributes = [
        'title' => 'Título',
        'expires_at' => 'Expiração',
    ];

    public function updated() {
        $this->validate([
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);
        $this->validVideo = $this->video;
    }

    public function save() {
        $validated = $this->validate([
            'title' => 'required|string|min:5|max:100',
            'expires_at' => 'required|date|after:now',
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);
        $this->path = $this->video->store('videos');
        try {
            $informative = Informative::create([
                'title' => $this->title,
                'active' => 1,
                'expires_at' => $this->expires_at
            ]);
            $informative->video()->create([
                'path' => $this->path,
            ]);
            $this->dialog([
                'title'       => 'Sucesso!',
                'description' => 'Informativo salvo com sucesso!',
                'icon'        => 'success'
            ]);
            $this->reset('title','expires_at','video','validVideo','path');
        } catch (\Throwable $th) {
            $this->dialog([
                'title'       => 'Erro!',
                'description' => 'Erro ao salvar informativo.',
                'icon'        => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.interactivity.informative.create')->layout('layouts.interactivity');
    }

}
