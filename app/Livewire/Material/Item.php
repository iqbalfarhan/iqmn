<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Item extends Component
{

    public Material $material;
    public function render()
    {
        return view('livewire.material.item');
    }
}
