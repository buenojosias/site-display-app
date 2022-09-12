<?php

namespace App\Http\Livewire\Interactivity\Informative;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Informative;

class InformativeCreate extends Component
{
    use Actions;
    use WithFileUploads;
    
    public $categories, $category_title, $category_id, $title, $type, $url, $active = false, $expires_at;
    public $media;
    public $validMedia;
    public $filename;
    public $path;

    protected $validationAttributes = [
        'category_title' => 'Título da categoria',
        'title' => 'Título do informativo',
        'category_id' => 'Categoria',
        'type' => 'Tipo de mídia',
        'url' => 'URL',
        'active' => 'Ativo',
        'expires_at' => 'Expiração',
    ];
    
    public function render()
    {
        $this->categories = Category::where('type', 'informative')->orderBy('title', 'asc')->get();
        return view('livewire.interactivity.informative.create')->layout('layouts.interactivity');
    }

    public function updatedMedia() {
        $this->validate([
            'type' => 'required',
            'media' => $this->type === 'IMAGE' ? 'mimes:jpeg,png,jpg,webp|max:3072' : 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);
        $this->validMedia = $this->media;
    }

    public function saveInformative() {
        $validatedInformative = $this->validate([
            'title' => 'required|string|min:5|max:100',
            'category_id' => 'required|integer|min:1',
            'type' => 'required|in:VIDEO,IMAGE,TEXT',
            'url' => 'nullable|url',
            'active' => 'required|boolean',
            'expires_at' => 'required|date|after:now',
            'media' => $this->type === 'IMAGE' ? 'mimes:jpeg,png,jpg,webp|max:3072' : 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);

        try {
            $this->filename = $this->media->store('midias/informatives', 's3');
            $this->path = Storage::disk('s3')->url($this->filename);
        } catch (\Throwable $th) {
            $this->dialog(['description' => 'Ocorreu um erro ao salvar a mídia.','icon'=>'error']);
            dd($th);
        }

        DB::beginTransaction();
        try {
            $informative = Informative::create($validatedInformative);
            if($this->type === 'IMAGE') {
                $media = $informative->image()->create(['filename' => $this->filename, 'path' => $this->path]);
            } else {
                $media = $informative->video()->create(['filename' => $this->filename, 'path' => $this->path]);
            }
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar o informativo.','icon'=>'error']);
        }
        if(@$informative && @$media) {
            DB::commit();
            return redirect()->route('admin.interactivity.informatives.list')->with('success','Informativo salvo com sucesso!');
        } else {
            DB::rollBack();
            Storage::disk('s3')->delete($this->filename);
            $this->dialog(['description'=>'Ocorreu um erro ao salvar o informativo.','icon'=>'error']);
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
