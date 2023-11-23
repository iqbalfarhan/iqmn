<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Index extends Component
{
    public $cari;

    public function delete(Material $material){
        $material->delete();
    }

    public function render()
    {
        return view('livewire.material.index', [
            'datas' => Material::when($this->cari, function ($q) {
                $q->where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari);
            })->get(),
        ]);
    }
}
