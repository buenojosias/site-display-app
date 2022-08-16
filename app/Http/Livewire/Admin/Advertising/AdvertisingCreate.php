<?php

namespace App\Http\Livewire\Admin\Advertising;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Models\Advertising;
use App\Models\Company;

class AdvertisingCreate extends Component
{
    use Actions;
    use WithFileUploads;
    
    public $company_id, $title, $cpd, $latitude, $longitude, $expires_at, $video;
    public $validVideo;
    public $path;

    protected $validationAttributes = [
        'company_id' => 'Empresa',
        'title' => 'Título',
        'cpd' => 'Custo por exibição',
        'expires_at' => 'Data de expiração',
    ];

    public function updated() {
        $this->validate([
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);
        $this->validVideo = $this->video;
    }

    public function save() {
        $validated = $this->validate([
            'company_id' => 'required|integer',
            'title' => 'required|string|min:5',
            'cpd' => 'required|integer|min:2|max:99',
            'expires_at' => 'required|date|after:now',
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);
        $this->path = $this->video->store('videos');
        try {
            $advertising = Advertising::create([
                'company_id' => $this->company_id,
                'title' => $this->title,
                'active' => 1,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'cpd' => $this->cpd,
                'expires_at' => \Carbon\Carbon::parse($this->expires_at)->format('Y-m-d H:i'),
            ]);
            $advertising->video()->create([
                'path' => $this->path,
            ]);
            $this->dialog([
                'title'       => 'Sucesso!',
                'description' => 'Campanha salva com sucesso!',
                'icon'        => 'success'
            ]);
        } catch (\Throwable $th) {
            dd($th);
            $this->dialog([
                'title'       => 'Erro!',
                'description' => 'Erro ao salvar campanha.',
                'icon'        => 'error'
            ]);
        }
    }

    public function render()
    {
        $companies = Company::select(['id','fantasy_name'])->where('active', true)->orderBy('fantasy_name', 'asc')->get();
        return view('admin.advertising.create', ['companies' => $companies])->layout('layouts.formside');
    }
}
