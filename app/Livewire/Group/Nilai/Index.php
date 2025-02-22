<?php

namespace App\Livewire\Group\Nilai;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public ?Group $group;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Group $group)
    {
        $this->group = $group;
    }

    public function render()
    {
        $authorized = Auth::user()->can('nilai.edit');
        $users = $this->group->users->load('roles')->filter(fn($user) => $user->roles->contains('name', 'pelajar'));

        return view('livewire.group.nilai.index', [
            'datas' => $this->group->nilais,
            'users' => $authorized ? $users->pluck('name', 'id') : $users->pluck('name', 'id')->filter(fn($item, $key) => $key == Auth::id()),
        ]);
    }
}
