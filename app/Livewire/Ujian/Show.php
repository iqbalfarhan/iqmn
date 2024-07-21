<?php

namespace App\Livewire\Ujian;

use App\Models\Ujian;
use Livewire\Component;

class Show extends Component
{
    public Ujian $ujian;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function mount($ujian){
        $this->ujian = $ujian;
    }
    public function render()
    {
        return view('livewire.ujian.show');
    }
}
