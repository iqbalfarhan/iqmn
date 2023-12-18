<?php

namespace App\Livewire\Forms;

use App\Models\Quiz;
use Livewire\Attributes\Rule;
use Livewire\Form;

class QuizForm extends Form
{

    public ?Quiz $quiz;

    #[Rule('required')]
    public $material_id = "";

    #[Rule('required')]
    public $question = "";

    #[Rule('required')]
    public $a = "";

    #[Rule('required')]
    public $b = "";

    #[Rule('required')]
    public $c = "";

    #[Rule('required')]
    public $d = "";

    #[Rule('required')]
    public $answer = "";

    public function setQuiz(Quiz $quiz){
        $this->quiz = $quiz;
    }

    public function store(){
        $this->validate();
        Quiz::create($this->all());
        $this->reset([
            'question',
            'a',
            'b',
            'c',
            'd',
            'answer',
        ]);
    }

    public function update(){
        $this->validate();
        $this->quiz->update($this->all());
        $this->reset();
    }
}
