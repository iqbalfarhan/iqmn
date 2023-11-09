<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Comot extends Component
{
    public function render()
    {
        return view('livewire.material.comot', [
            'datas' => auth()->user()->materials
        ]);
    }
}
