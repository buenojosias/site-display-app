<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    use Actions;

    public $email, $password, $remember_me;
    public $type = 'ADMIN';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $validationAttributes = [
        'password' => 'senha',
    ];

    public function submit() {
        $this->validate();

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password, 'type' => $this->type))){
            return redirect()->to('/admin');
        }else{
            session()->flash('error', 'E-mail ou senha incorreto.');
            // $this->notification()->error(
            //     $description = 'E-mail ou senha incorreto.'
            // );
            // $this->password = '';
        }
    }

    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.guest');
    }

    

}
