<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    public $email;
    public $password;

    public function login()
    {
        $valid = $this->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $this->flash('success', 'Login berhasil');
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
