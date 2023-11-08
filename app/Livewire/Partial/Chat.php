<?php

namespace App\Livewire\Partial;

use App\Models\User;
use Livewire\Component;

class Chat extends Component
{

    public User $user;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }
    
    public function render()
    {
        return view('livewire.partial.chat');
    }
}
