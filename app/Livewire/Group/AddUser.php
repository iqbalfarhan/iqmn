<?php

namespace App\Livewire\Group;

use App\Models\Group;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class AddUser extends Component
{
    public $show = false;
    public $user_ids = [];
    public $members = [];

    public ?Group $group;

    #[On("addToGroup")]
    public function addToGroup(Group $group){
        $this->group = $group;
        $this->show = true;
        $this->user_ids = $group->users->pluck('id')->toArray();
    }

    public function simpan(){
        $this->validate([
            'user_ids' => 'required|array',
        ]);

        foreach ($this->user_ids as $id) {
            $user = User::find($id);
            $user->groups()->syncWithoutDetaching($this->group->id);
        }

        $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.group.add-user', [
            'users' => User::pluck('name', 'id'),
        ]);
    }
}
