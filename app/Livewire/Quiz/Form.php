<?php

namespace App\Livewire\Quiz;

use App\Livewire\Forms\QuizForm;
use Livewire\Component;

class Form extends Component
{
    public $show = false;

    public QuizForm $form;

    public function mount($material_id, $model = "material")
    {
        if($model == "material") {
            $this->form->material_id = $material_id;
        }
        else{
            $this->form->ujian_id = $material_id;
        }
    }

    public function simpan(){
        $this->form->store();
        $this->dispatch('reload');
        $this->reset('show');
    }

    public function render()
    {
        return view('livewire.quiz.form');
    }
}
