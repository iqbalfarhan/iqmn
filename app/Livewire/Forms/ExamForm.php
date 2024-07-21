<?php

namespace App\Livewire\Forms;

use App\Models\Exam;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExamForm extends Form
{
    public $user_id;
    public $ujian_id;
    public $data = Exam::$initialData;
    public $selesai;

    public ?Exam $exam;

    public function setExam(Exam $exam){
        $this->exam = $exam;

        $this->user_id = $exam->user_id;
        $this->ujian_id = $exam->ujian_id;
        $this->data = $exam->data;
        $this->selesai = $exam->selesai;
    }

    public function store(){
        $this->validate();
        Exam::create($this->all());
        $this->reset();
    }

    public function update(){
        $this->validate();
        $this->exam->update($this->all());
        $this->reset();
    }
}
