<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use LivewireAlert, WithFileUploads;
    public $name;
    public $show = false;
    public $logo;

    public function simpan()
    {
        $valid = $this->validate([
            "name" => "required",
        ]);

        Group::create($valid);
        $this->alert('success', 'berhasil menambahkan group baru');

        $this->dispatch('reload');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.group.form');
    }
}
