<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Company;
use App\Models\User;

class CompanyUser extends Component
{
    use Actions;

    public $company;
    public $currentUser;
    public $selectedUser;
    public $users;

    public function getUsers() {
        $users = User::where('type', 'COMPANY')->orderBy('name', 'asc')->get();
        $this->users = $users;
    }

    public function forgetUsers() {
        $this->users = null;
    }

    public function setUser($user) {
        $this->selectedUser = $user;
        $this->dialog()->confirm([
            'title'       => 'Confirma esta seleção?',
            'description' => 'Tem certeza que deseja vincular o(a) usuário(a) '. $user['name'] .' a esta empresa?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Confirmar',
                'method' => 'syncUser',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'Cancelar',
                //'method' => 'cancel',
            ],
        ]);
    }

    public function syncUser() {
        try {
            $this->company->update(['user_id' => $this->selectedUser['id']]);
            $this->currentUser = $this->selectedUser;
            $this->users = null;
            $this->dialog([
                'title' => 'Sucesso!','description'=>'Usuário vinculado à empresa com sucesso.','icon'=>'success'
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function mount(Company $company)
    {
        $this->company = $company;
        if($company->user) {
            $this->currentUser = $company->user;
        }
    }

    public function render()
    {
        return view('livewire.company.user');
    }
}
