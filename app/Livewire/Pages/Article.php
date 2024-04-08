<?php

namespace App\Livewire\Pages;

use App\Models\Material;
use Livewire\Component;

class Article extends Component
{
    public Material $material;

    public function mount(Material $material){
        $this->material = $material;
    }

    public function render()
    {
        return view('livewire.pages.article');
    }
}
