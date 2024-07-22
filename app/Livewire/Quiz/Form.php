<?php

namespace App\Livewire\Quiz;

use App\Livewire\Forms\QuizForm;
use App\Models\Quiz;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public $show = false;

    public QuizForm $form;


    #[On('createQuiz')]
    public function createQuiz($material_id, $model = "material")
    {
        $this->show = true;
        switch ($model) {
            case 'material':
                $this->form->material_id = $material_id;
                break;

            case 'ujian':
                $this->form->ujian_id = $material_id;
                break;
        }
    }

    #[On('updateQuiz')]
    public function updateQuiz(Quiz $quiz){
        $this->show = true;
        $this->form->setQuiz($quiz);
    }

    #[On('deleteQuiz')]
    public function deleteQuiz(Quiz $quiz){
        $quiz->delete();
        $this->dispatch('reload');
    }

    public function simpan(){
        if (isset($this->form->quiz)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->reset('show');
    }

    public function closeModal(){
        $this->form->reset();
        $this->reset('show');

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.quiz.form');
    }
}
