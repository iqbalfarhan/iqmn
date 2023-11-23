<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class CountMateriku extends Component
{

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.partial.count-materiku', [
            'count' => auth()->user()->materials->count()
        ]);
    }
}
