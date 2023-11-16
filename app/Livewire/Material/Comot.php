<?php

namespace App\Livewire\Material;

use Livewire\Attributes\Title;
use Livewire\Component;

class Comot extends Component
{
    #[Title("Materi yang saya pin")]

    public function render()
    {
        return view('livewire.material.comot', [
            'datas' => auth()->user()->materials
        ]);
    }
}
