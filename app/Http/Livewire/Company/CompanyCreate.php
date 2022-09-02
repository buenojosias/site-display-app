<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Models\Segment;
use App\Models\SegmentCategory;

class CompanyCreate extends Component
{
    use WithFileUploads;
    use Actions;

    public $segments, $segment_id, $fantasy_name, $corporate_name, $cnpj;
    public $segment_category_id, $segment_title, $categories; // Para adicionar novos segmentos
    public $region = 'CWB';
    public $logo;
    public $validLogo;
    private $filename;
    public $path;

    public function render()
    {
        $this->segments = Segment::orderBy('title')->get();
        $this->categories = SegmentCategory::orderBy('title')->get();
        return view('livewire.company.create')->layout('layouts.formside');
    }

    public function updated() {
        $this->validate([
            'logo' => 'mimes:mimes:jpeg,png,jpg,jpeg|max:3072',
        ]);
        $this->validLogo = $this->logo;
    }
    
    public function saveCompany() {
        $validatedCompany = $this->validate([
            'segment_id' => 'required|integer|min:1',
            'fantasy_name' => 'required|string|min:3|max:180',
            'corporate_name' => 'required|string|min:5|max:180',
            'cnpj' => 'required|string|size:14|unique:companies',
            'region' => 'required|string|size:3',
            'logo' => 'nullable|mimes:mimes:jpeg,png,jpg,jpeg|max:3072',
        ]);

        if($this->logo) {
            try {
                $this->filename = $this->logo->store('midias/logos', 's3');
                $this->path = Storage::disk('s3')->url($this->filename);
            } catch (\Throwable $th) {
                $this->dialog(['description' => 'Ocorreu um erro ao salvar logomarca.','icon'=>'error']);
                dd($th);
            }
        }
        
        DB::beginTransaction();
        try {
            $company = Company::create($validatedCompany);
            $balance = $company->balance()->create();
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao cadastrar empresa.','icon'=>'error']);
            dd($th);
        }
        if($company && $balance) {
            if($this->filename) { $company->logo()->create(['filename' => $this->filename, 'path' => $this->path]); }
            DB::commit();
            return redirect()->route('admin.companies.edit', $company)->with('success','Empresa cadastrada com sucesso!');
        } else {
            DB::rollBack();
            if($this->filename) { Storage::disk('s3')->delete($this->filename); }
            $this->dialog(['description'=>'Ocorreu um erro ao cadastrar empresa.','icon'=>'error']);
        }
    }

    public function saveSegment() {
        dd('salvar');
        $validatedSegment = $this->validate([
            'segment_title' => 'required|string|min:3|max:64',
            'segment_category_id' => 'required|numeric|min:1',
        ]);
        try {
            Segment::create($validatedSegment);
            $this->segment_title = '';
            $this->segment_category_id = '';
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    protected $validationAttributes = [
        'segment_id' => 'Segmento',
        'fantasy_name' => 'Nome Fantasia',
        'cnpj' => 'CNPJ',
        'corporate_name' => 'Razão Social',
        'logo' => 'Logomarca',
        'default_cost' => 'Custo padrão'
    ];
}
