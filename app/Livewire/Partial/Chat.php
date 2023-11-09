<?php

namespace App\Livewire\Partial;

use App\Models\Discussion;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{

    public Discussion $discussion;

    public function render()
    {
        return view('livewire.partial.chat');
    }
}
