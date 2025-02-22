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
        return view('livewire.group.nilai.index', [
            'datas' => $this->group->nilais,
            'users' => $authorized ? $this->group->users->pluck('name', 'id') : $this->group->users->pluck('name', 'id')->filter(fn($item, $key) => $key == Auth::id()),
        ]);
    }
}
