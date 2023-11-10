<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Cari extends Component
{

    public $cari;

    public function pencarian()
    {
        $this->validate([
            'cari' => 'string|required'
        ]);
    }

    public function render()
    {
        return view('livewire.material.cari', [
            'datas' => Material::when($this->cari, function ($q) {
                $q->where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari);
            })->get(),
        ]);
    }
}
