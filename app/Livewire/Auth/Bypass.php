<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bypass extends Component
{
    public function login(User $user){
        Auth::login($user);
        $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.bypass', [
            'datas' => User::get()
        ]);
    }
}
