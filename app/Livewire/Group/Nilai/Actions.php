<?php

namespace App\Livewire\Group\Nilai;

use App\Livewire\Forms\NilaiForm;
use App\Models\Group;
use App\Models\Nilai;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    public Group $group;
    public $show = false;

    public NilaiForm $form;

    #[On('editNilai')]
    public function editNilai(Nilai $nilai){
        $this->form->setNilai($nilai);
        $this->show = true;
    }

    #[On('createNilai')]
    public function createNilai($label, $group_id, $user_id){
        $this->form->reset();

        $this->form->label = $label;
        $this->form->group_id = $group_id;
        $this->form->user_id = $user_id;

        $this->show = true;
    }

    public function simpan()
    {
        if (isset($this->form->nilai)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.group.nilai.actions', [
            'users' => $this->group->users->pluck('name', 'id'),
        ]);
    }
}
