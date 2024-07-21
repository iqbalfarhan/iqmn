<?php

namespace App\Livewire\Ujian;

use App\Models\Ujian;
use Livewire\Component;

class User extends Component
{
    public Ujian $ujian;

    public function mount(Ujian $ujian){
        $this->ujian = $ujian;
    }

    public function render()
    {
        return view('livewire.ujian.user');
    }
}
