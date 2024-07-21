<?php

namespace App\Livewire\Ujian;

use App\Models\Exam;
use App\Models\Ujian;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class User extends Component
{
    public Ujian $ujian;
    public ?Exam $exam;
    public UserModel $user;

    public function mount(Ujian $ujian){
        $this->user = UserModel::find(Auth::id());
        $this->ujian = $ujian;

        $this->exam = $this->ujian->exams->where('user_id', $this->user->id)->first();
    }

    public function joinUjian(){
        $user_id = $this->user->id;
        $ujian_id = $this->ujian->id;
        $initialData = Exam::$initialData;

        Exam::create([
            'user_id' => $user_id,
            'ujian_id' => $ujian_id,
            'data' => $initialData
        ]);
    }

    public function render()
    {
        return view('livewire.ujian.user');
    }
}
