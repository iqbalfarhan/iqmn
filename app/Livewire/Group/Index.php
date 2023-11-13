<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.group.index', [
            'datas' => Group::get()
        ]);
    }
}
