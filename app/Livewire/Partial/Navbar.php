<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Navbar extends Component
{
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.partial.navbar', [
            'user' => auth()->user()
        ]);
    }
}
