<?php

namespace App\Livewire\Ujian;

use App\Models\Ujian;
use Livewire\Component;

class Item extends Component
{
    public Ujian $ujian;

    public function mount($ujian){
        $this->ujian = $ujian;
    }

    public function render()
    {
        return view('livewire.ujian.item');
    }
}
