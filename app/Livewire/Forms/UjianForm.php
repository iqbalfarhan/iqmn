<?php

namespace App\Livewire\Forms;

use App\Models\Ujian;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UjianForm extends Form
{
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $group_id;
    #[Validate('required')]
    public $start;

    public ?Ujian $ujian;

    public function setUjian(Ujian $ujian){
        $this->ujian = $ujian;

        $this->title = $ujian->title;
        $this->description = $ujian->description;
        $this->group_id = $ujian->group_id;
        $this->start = $ujian->start;
    }

    public function store(){
        $this->validate();
        Ujian::create($this->all());
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
