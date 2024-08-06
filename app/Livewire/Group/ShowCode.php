<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowCode extends Component
{
    public ?Group $group;

    #[On('showCode')]
    public function showCode(Group $group){
        $this->group = $group;
    }

    public function closeModal(){
        $this->reset('group');
    }

    public function render()
    {
        return view('livewire.group.show-code');
    }
}
