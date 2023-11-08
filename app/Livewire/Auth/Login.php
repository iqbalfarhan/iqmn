<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public function mount()
    {
        Auth::loginUsingId(1);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
