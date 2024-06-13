<?php

namespace App\Livewire\Group;

use App\Helpers\UtilsHelper;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use LivewireAlert, WithFileUploads;
    public $photo;
    public $show = false;
    public GroupForm $form;

    public function simpan()
    {
        if ($this->photo) {
            $this->form->logo = $this->photo->store('group');
        }

        if (isset($this->form->group)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->alert('success', 'berhasil menambahkan group baru');

        $this->dispatch('reload');
        $this->closeModal();
    }

    #[On('createGroup')]
    public function createGroup()
    {
        $this->form->generateCode();
        $this->form->user_id = auth()->id();
        $this->show = true;
    }

    public function regenerateCode(){
        $this->form->generateCode();
    }

    #[On('deleteGroup')]
    public function deleteGroup(Group $group)
    {
        $group->users()->detach();
        $group->delete();
        $this->dispatch('reload');
    }

    #[On('editGroup')]
    public function editGroup(Group $group)
    {
        $this->form->setGroup($group);

        if (!isset($group->user_id)) {
            $this->form->user_id = auth()->id();
        }

        $this->show = true;
    }

    public function closeModal()
    {
        $this->form->reset();

        $this->show = false;
        $this->photo = null;
    }


    public function render()
    {
        return view('livewire.group.form');
    }
}
