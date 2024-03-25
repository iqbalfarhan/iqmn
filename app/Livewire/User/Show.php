<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
