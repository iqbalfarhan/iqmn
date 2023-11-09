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
            'cari' => 'string|required|min:5'
        ]);
    }

    public function render()
    {
        return view('livewire.material.cari', [
            'datas' => $this->cari ? Material::where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari)->get() : [],
        ]);
    }
}
