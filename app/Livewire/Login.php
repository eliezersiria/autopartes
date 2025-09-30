<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class Login extends Component
{
    use Toast;
    public $email;
    public $password;
    public $remember = false;

    protected $rules = ['email' => 'required|email', 'password' => 'required|min:6'];

    public function mount()
    {
        if (auth()->check())
        {
            return redirect()->route('dashboard');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember))
        {
            session()->regenerate();

            // Redirige hacia dashboard usando Livewire Navigate
            //sleep(0.5);
            return $this->redirect('dashboard', navigate: true);
        }
        // Toast de error en el login
        $this->addError('email', 'Las credenciales no coinciden.');
    }


    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
