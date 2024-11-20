<?php

namespace App\Livewire\Forms;

use App\Models\Tugas;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TugasForm extends Form
{
    public $group_id;
    public $title;
    public $body;
    public $attachment;
    public $duedate;

    public ?Tugas $tugas;

    public function setTugas(Tugas $tugas)
    {
        $this->tugas = $tugas;

        $this->group_id = $tugas->group_id;
        $this->title = $tugas->title;
        $this->body = $tugas->body;
        $this->attachment = $tugas->attachment;
        $this->duedate = $tugas->duedate;
    }

    public function store()
    {
        $valid = $this->validate([
            'group_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'attachment' => 'required',
            'duedate' => 'required',
        ]);

        Tugas::create($valid);
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'group_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'attachment' => 'required',
            'duedate' => 'required',
        ]);

        $this->tugas->update($valid);
        $this->reset();
    }
}
