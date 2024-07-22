<?php

namespace App\Livewire\Forms;

use App\Models\Quiz;
use Livewire\Attributes\Rule;
use Livewire\Form;

class QuizForm extends Form
{

    public ?Quiz $quiz;


    public $material_id = "";
    public $ujian_id = "";
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
        $this->validate([
            'question' => 'required',
            'media' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
        ]);
        Quiz::create($this->all());
        $this->reset([
            'material_id',
            'ujian_id',
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
        $this->validate([
            'question' => 'required',
            'media' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
        ]);
        $this->quiz->update($this->all());
        $this->reset();
    }
}
