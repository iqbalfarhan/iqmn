<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Index extends Component
{
    public function delete(Material $material){
        $material->delete();
    }

    public function render()
    {
        return view('livewire.material.index', [
            'datas' => Material::get()
        ]);
    }
}
