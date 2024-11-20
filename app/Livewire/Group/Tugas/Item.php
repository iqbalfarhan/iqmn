<?php

namespace App\Livewire\Group\Tugas;

use App\Models\Tugas;
use Livewire\Component;

class Item extends Component
{
    public Tugas $tugas;

    public function mount(Tugas $tugas)
    {
        $this->tugas = $tugas;
    }

    public function render()
    {
        return view('livewire.group.tugas.item');
    }
}
