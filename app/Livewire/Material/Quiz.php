<?php

namespace App\Livewire\Material;

use App\Models\Material;
use Livewire\Component;

class Quiz extends Component
{
    public $show = false;
    public $no = 1;
    public $jawaban = [];
    public $datas;
    public $answers = [];
    public $nilai = 0;
    public $bobot = 0;


    public Material $material;

    public function mount(Material $material){
        if($material->quizzes->count() == 0){
            abort(404);
        }
        $this->material = $material;
        $this->datas = $material->quizzes;

        $this->bobot = 100 / $this->datas->count();

        $this->answers = $material->quizzes->pluck('answer', 'id');
    }

    public function unsetJawaban($key)
    {
        unset($this->jawaban[$key]);
    }

    public function periksa()
    {
        $this->validate([
            'jawaban.*' => 'required'
        ]);

        $this->reset('nilai');
        foreach ($this->jawaban as $key => $value) {
            if($this->jawaban[$key] == $this->answers[$key]) {
                $this->nilai += $this->bobot;
            }
        }

        $this->show = true;
    }

    public function render()
    {
        return view('livewire.material.quiz');
    }
}
