<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $valid = $this->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
