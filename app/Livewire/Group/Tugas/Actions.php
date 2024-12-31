<?php

namespace App\Livewire\Group\Tugas;

use App\Livewire\Forms\TugasForm;
use App\Models\Group;
use App\Models\Tugas;
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

    #[On('editTugas')]
    public function editTugas(Tugas $tugas)
    {
        $this->form->setTugas($tugas);
        $this->show = true;
    }

    #[On('deleteTugas')]
    public function deleteTugas(Tugas $tugas)
    {
        $tugas->delete();
        $this->dispatch('reload');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->attachment = $this->photo->store('tugas');
        }

        if (isset($this->form->tugas)) {
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
