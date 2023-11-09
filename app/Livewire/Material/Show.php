<?php

namespace App\Livewire\Material;

use App\Models\Discussion;
use App\Models\Material;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;

    public Material $material;
    public User $user;
    public $mine = false;

    protected $listeners = ['reload' => '$refresh'];

    public function attachMaterial()
    {
        if (!in_array($this->material->id, $this->user->materials->pluck('id')->toArray())) {
            $this->user->materials()->attach($this->material->id);
            $this->mine = true;
            $this->alert('success', "Material ditambahkan ke daftar comot kamu");
        } else {
            $this->user->materials()->detach($this->material->id);
            $this->mine = false;
            $this->alert('success', "Material dihapus ke daftar comot kamu");
        }


        $this->dispatch('reload');
    }

    public function mount()
    {
        $this->user = User::find(auth()->id());
        $this->mine = in_array($this->material->id, $this->user->materials->pluck('id')->toArray()) ? true : false;
    }

    public function render()
    {
        return view('livewire.material.show', [
            'discussions' => Discussion::where('material_id', $this->material->id)->get()
        ]);
    }
}
