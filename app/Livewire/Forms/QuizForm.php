<?php

namespace App\Livewire\Forms;

use App\Models\Quiz;
use Livewire\Attributes\Rule;
use Livewire\Form;

class QuizForm extends Form
{

    public ?Quiz $quiz;


    public $material_id;
    public $ujian_id;
    public $media = "";
    public $question = "";
    public $a = "";
    public $b = "";
    public $c = "";
    public $d = "";
    public $answer = "";

    public function setQuiz(Quiz $quiz){
        $this->quiz = $quiz;
    }

    public function store(){
        $valid = $this->validate([
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
        ]);

        if ($this->material_id) {
            $valid['material_id'] = $this->material_id;
        }

        if ($this->ujian_id){
            $valid['ujian_id'] = $this->ujian_id;
        }

        Quiz::create($valid);
        $this->reset([
            'question',
            'media',
            'a',
            'b',
            'c',
            'd',
            'answer',
        ]);
    }

    public function update(){
        $valid = $this->validate([
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
        ]);

        if ($this->material_id) {
            $valid['material_id'] = $this->material_id;
        }

        if ($this->ujian_id){
            $valid['ujian_id'] = $this->ujian_id;
        }
        $this->quiz->update($valid);
        $this->reset([
            'question',
            'media',
            'a',
            'b',
            'c',
            'd',
            'answer',
        ]);
    }
}
