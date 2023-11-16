<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Selamat datang')]

    public function render()
    {
        return view('livewire.pages.home', [
            'materials' => auth()->user()->materials->take(3)
        ]);
    }
}
