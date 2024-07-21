<?php

namespace App\Livewire\Ujian;

use App\Models\Ujian;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    #[On('toggleStart')]
    public function toggleStart(Ujian $ujian)
    {
        $ujian->start = !$ujian->start;
        $ujian->save();

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.ujian.actions');
    }
}
