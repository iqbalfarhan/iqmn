<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use LivewireAlert, WithFileUploads;
    public $name;
    public $show = false;
    public $logo;
    public ?Group $group;

    public function simpan()
    {
        $valid = $this->validate([
            "name" => "required|unique:groups,name",
        ]);

        if (isset($this->group)) {
            $this->group->update($valid);
        }
        else{
            Group::create($valid);
        }

        $this->alert('success', 'berhasil menambahkan group baru');

        $this->dispatch('reload');
        $this->reset();
    }

    #[On('deleteGroup')]
    public function deleteGroup(Group $group)
    {
        $group->delete();
        $this->dispatch('reload');
    }

    #[On('editGroup')]
    public function editGroup(Group $group)
    {
        $this->group = $group;
        $this->name = $group->name;
        $this->show = true;
    }


    public function render()
    {
        return view('livewire.group.form');
    }
}
