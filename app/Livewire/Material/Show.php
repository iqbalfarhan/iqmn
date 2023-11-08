<?php

namespace App\Livewire\Material;

use App\Models\Material;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{

    public Material $material;
    public User $user;

    public function attachMaterial()
    {
        if (!in_array($this->material->id, $this->user->materials->pluck('id')->toArray())) {
            $this->user->materials()->attach($this->material->id);
        }
        else{
            $this->user->materials()->detach($this->material->id);
        }
    }

    public function mount(){
        $this->user = User::find(auth()->id());
    }
    
    public function render()
    {
        return view('livewire.material.show');
    }
}
