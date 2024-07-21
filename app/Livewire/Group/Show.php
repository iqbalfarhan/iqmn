<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public Group $group;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Group $group){
        $this->group = $group;
    }

    public function keluargroup(){
        $user = Auth::user();
        $user->groups()->detach($this->group->id);

        $this->redirect(route('group.mine', true));
    }

    public function render()
    {
        return view('livewire.group.show');
    }
}
