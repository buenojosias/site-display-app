<?php

namespace App\Http\Livewire\Admin\Advertising;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;
use App\Models\Advertising;
use App\Models\Company;

class AdvertisingCreate extends Component
{
    use WithFileUploads;
    use Actions;
    
    public $company_id, $title, $cpd, $latitude, $longitude, $expires_at;
    public $video;
    public $validVideo;
    private $filename;
    private $path;

    protected $validationAttributes = [
        'company_id' => 'Empresa',
        'title' => 'Título',
        'cpd' => 'Custo por exibição',
        'expires_at' => 'Data de expiração',
        'video' => 'Vídeo',
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

        try {
            $this->filename = $this->video->store('midias/advertisings', 's3');
            $this->path = Storage::disk('s3')->url($this->filename);
        } catch (\Throwable $th) {
            $this->dialog(['description' => 'Ocorreu um erro ao salvar o vídeo.','icon'=>'error']);
            dd($th);
        }

        DB::beginTransaction();
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
            $video = $advertising->video()->create(['filename' => $this->filename,'path' => $this->path,]);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao salvar a campanha.','icon'=>'error']);
        }

        if(@$advertising && @$video) {
            DB::commit();
            return redirect()->route('admin.advertisings.show', $advertising)->with('success','Campanha salva com sucesso!');
        } else {
            DB::rollBack();
            Storage::disk('s3')->delete($this->filename);
            $this->dialog(['description'=>'Ocorreu um erro ao salvar a campanha.','icon'=>'error']);
        }
    }

    public function render()
    {
        $companies = Company::select(['id','fantasy_name','default_cost'])->where('active', true)->orderBy('fantasy_name', 'asc')->get();
        return view('admin.advertising.create', ['companies' => $companies])->layout('layouts.formside');
    }
}
