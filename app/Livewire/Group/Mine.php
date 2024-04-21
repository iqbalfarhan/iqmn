<?php

namespace App\Livewire\Group;

use App\Models\Group;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Mine extends Component
{
    #[Title('Group saya')]

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        $user = User::find(auth()->id());

        return view('livewire.group.mine', [
            'datas' => $user->groups
        ]);
    }
}
