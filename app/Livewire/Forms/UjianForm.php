<?php

namespace App\Livewire\Forms;

use App\Models\Ujian;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UjianForm extends Form
{
    public $title;
    public $description;
    public $group_id;
    public $start = false;

    public ?Ujian $ujian;

    public function setUjian(Ujian $ujian){
        $this->ujian = $ujian;

        $this->title = $ujian->title;
        $this->description = $ujian->description;
        $this->group_id = $ujian->group_id;
        $this->start = $ujian->start;
    }

    public function store(){
        $valid = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'group_id' => 'required',
            'start' => 'required',
        ]);
        Ujian::create($valid);
        $this->reset([
            'title',
            'description',
            'group_id',
            'start',
        ]);
    }

    public function update(){
        $this->validate();
        $this->ujian->update($this->all());
        $this->reset();
    }
}
