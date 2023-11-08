<?php

namespace App\Livewire\Pages;

use App\Models\Material;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'materials' => auth()->user()->materials->take(3)
        ]);
    }
}
