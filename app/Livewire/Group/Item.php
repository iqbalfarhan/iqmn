<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class Item extends Component
{
    public Group $group;

    public function render()
    {
        return view('livewire.group.item');
    }
}
