<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Index extends Component
{
    public $cari;

    protected $fillable = ['reload' => '$refresh'];

    public function delete(Material $material){
        $material->delete();
    }

    public function toggleShowMaterial(Material $material){
        $old = $material->show;
        $material->show = !$old;
        $material->save();
    }

    public function render()
    {
        return view('livewire.material.index', [
            'datas' => Material::when($this->cari, function ($q) {
                $q->where('title', 'like', '%' . $this->cari . '%')->orWhereJsonContains('tags', $this->cari);
            })->latest()->get(),
        ]);
    }
}
