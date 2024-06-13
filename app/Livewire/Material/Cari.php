<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cari extends Component
{

    #[Title('Cari materi pembelajaran')]

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
            'datas' => Material::where('show', true)->when($this->cari, function ($q) {
                $q->where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari);
            })->latest()->limit(6)->get(),
        ]);
    }
}
