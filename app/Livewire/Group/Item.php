<?php

namespace App\Livewire\Group;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Item extends Component
{
    public Group $group;

    public $showToggleJoin = true;

    protected $listeners = ['reload' => '$refresh'];

    public function joinGroup()
    {
        $user = User::find(auth()->id());
        $user->groups()->attach($this->group->id);

        $this->dispatch('reload');
        $this->dispatch('closeSearchGroup');
    }

    public function unJoinGroup()
    {
        $user = User::find(auth()->id());
        $user->groups()->detach($this->group->id);

        $this->dispatch('reload');
        $this->dispatch('closeSearchGroup');
    }


    public function render()
    {
        $user = User::find(auth()->id())->groups->pluck('id');

        return view('livewire.group.item', [
            'join' => in_array($this->group->id, $user->toArray())
        ]);
    }
}
