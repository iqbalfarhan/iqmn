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

    public function mount(Ujian $ujian){
        $this->user_id = Auth::id();
        $this->ujian = $ujian;

        $this->exam = $this->ujian->exams->where('user_id', $this->user_id)->first();
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

    public function render()
    {
        return view('livewire.ujian.user');
    }
}
