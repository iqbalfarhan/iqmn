<?php

namespace App\Livewire\Forms;

use App\Models\Nilai;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NilaiForm extends Form
{

    public $label;
    public $user_id;
    public $group_id;
    public $value;
    public ?Nilai $nilai;

    public function setNilai(Nilai $nilai){
        $this->nilai = $nilai;

        $this->label = $nilai->label;
        $this->user_id = $nilai->user_id;
        $this->group_id = $nilai->group_id;
        $this->value = $nilai->value;
    }

    public function store()
    {
        $valid = $this->validate([
            'user_id' => 'required',
            'group_id' => 'required',
            'value' => 'required',
            'label' => 'required',
        ]);

        Nilai::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'value' => 'required',
        ]);

        $this->nilai->update($valid);
        $this->reset();
    }
}
