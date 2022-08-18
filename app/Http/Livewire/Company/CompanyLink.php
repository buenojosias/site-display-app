<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Link;

class CompanyLink extends Component
{
    use Actions;

    public $company;
    public $links;
    public $slug, $phone, $whatsapp, $facebook, $instagram, $site;

    public function mount(Company $company) {
        $this->company = $company;
        if($links = $company->links()->first()) {
            $this->links = $links;
            $this->slug = $links->slug;
            $this->phone = $links->phone;
            $this->whatsapp = $links->whatsapp;
            $this->facebook = $links->facebook;
            $this->instagram = $links->instagram;
            $this->site = $links->site;
        } else {
            $this->slug = Str::slug($this->company->fantasy_name, '-').'-'.rand(111,999);
        }
    }

    protected $validationAttributes = [
        'phone' => 'Telefone',
        'whatsapp' => 'WhatsApp',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'site' => 'Site',
    ];

    public function saveLink() {
        $validatedLinks = $this->validate([
            'slug' => 'required|string|min:5|max:100',
            'phone' => 'nullable|string|min:10|max:11',
            'whatsapp' => 'nullable|string|min:10|max:11',
            'facebook' => 'nullable|string|min:3|max:100',
            'instagram' => 'nullable|string|min:3|max:50',
            'site' => 'nullable|url',
        ]);

        if($this->links) {
            try {
                $this->links->update($validatedLinks);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Informações salvas com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar informações.','icon'=>'error'
                ]);
            };
        } else {
            try {
                $this->links = $this->company->links()->create($validatedLinks);
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Informações salvas com sucesso.','icon'=>'success'
                ]);
            } catch (\Throwable $th) {
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar informações.','icon'=>'error'
                ]);
            };
        }
    }

    public function render()
    {
        return view('livewire.company.link');
    }
}
