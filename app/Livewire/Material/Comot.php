<?php

namespace App\Livewire\Material;

use Livewire\Attributes\Title;
use Livewire\Component;

class Comot extends Component
{
    #[Title("Materi yang saya pin")]

    public $cari;

    public function render()
    {
        $datas = auth()->user()->materials();

        return view('livewire.material.comot', [
            'datas' => $datas->when($this->cari, function ($q) {
                $q->where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari);
            })->get(),
        ]);
    }
}
