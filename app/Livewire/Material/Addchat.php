<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Addchat extends Component
{
    public Material $material;
    public $show = false;
    public $chat;

    public function addDiscussion()
    {
        $this->validate([
            'chat' => 'required'
        ]);

        $this->material->discussions()->create([
            'user_id' => auth()->id(),
            'chat' => $this->chat,
        ]);

        $this->reset();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.material.addchat');
    }
}
