<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

    public User $user;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
