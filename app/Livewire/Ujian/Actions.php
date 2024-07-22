<?php

namespace App\Livewire\Ujian;

use App\Livewire\Forms\UjianForm;
use App\Models\Group;
use App\Models\Ujian;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    public $show = false;

    public UjianForm $form;

    #[On('createUjian')]
    public function createUjian()
    {
        $this->show = true;
    }

    #[On('toggleStart')]
    public function toggleStart(Ujian $ujian)
    {
        $ujian->start = !$ujian->start;
        $ujian->save();

        $this->dispatch('reload');
    }

    public function submit()
    {
        if (isset($this->form->ujian)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->reset('show');
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.ujian.actions', [
            'kelas_ids' => Group::pluck('name', 'id')
        ]);
    }
}
