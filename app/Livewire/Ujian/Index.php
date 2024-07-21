<?php

namespace App\Livewire\Ujian;

use App\Models\Ujian;
use Livewire\Component;

class Index extends Component
{
    public function delete(Ujian $ujian) {
        $ujian->delete();
    }

    public function render()
    {
        return view('livewire.ujian.index', [
            'datas' => Ujian::get()
        ]);
    }
}
