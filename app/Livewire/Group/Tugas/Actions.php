<?php

namespace App\Livewire\Group\Tugas;

use App\Livewire\Forms\TugasForm;
use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;

    public $show = false;
    public $photo;

    public TugasForm $form;
    public ?Group $group;

    #[On('createTugas')]
    public function createTugas($group_id)
    {
        $this->form->group_id = $group_id;
        $this->group = Group::find($group_id);
        $this->show = true;
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->attachment = $this->photo->store('tugas');
        }

        if (isset($this->form->group)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->reset('show');
        $this->reset('photo');

        $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.group.tugas.actions');
    }
}
