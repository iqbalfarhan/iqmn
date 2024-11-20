<?php

namespace App\Livewire\Group\Tugas;

use App\Models\Group;
use App\Models\Tugas;
use Livewire\Component;

class Index extends Component
{
    public Group $group;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Group $group)
    {
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.group.tugas.index', [
            'datas' => Tugas::where('group_id', $this->group->id)->get()
        ]);
    }
}
