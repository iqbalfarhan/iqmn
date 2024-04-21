<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class Show extends Component
{
    public Group $group;

    public function mount(Group $group){
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.group.show');
    }
}
