<?php

namespace App\Livewire\Ujian;

use App\Models\Exam;
use App\Models\Ujian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class User extends Component
{
    public Ujian $ujian;
    public ?Exam $exam;

    public $user_id;
    public $showDescription = false;
    public $nilai = 0;
    public $jawaban = [];
    public $answers = [];
    public $bobot;
    public $no = 1;
    public $show = false;

    public function mount(Ujian $ujian){
        $this->user_id = Auth::id();
        $this->ujian = $ujian;

        $this->exam = $this->ujian->exams->where('user_id', $this->user_id)->first();
    }

    public function unsetJawaban($key)
    {
        unset($this->jawaban[$key]);
    }

    public function toggleShowDescription()
    {
        $this->showDescription = !$this->showDescription;
    }

    public function joinUjian(){
        $user_id = $this->user_id;
        $ujian_id = $this->ujian->id;
        $initialData = Exam::$initialData;

        Exam::create([
            'user_id' => $user_id,
            'ujian_id' => $ujian_id,
            'data' => $initialData
        ]);

        $this->redirect(route('ujian.user', $this->ujian->id), true);
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
        return view('livewire.ujian.user');
    }
}
