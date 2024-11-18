<?php

namespace App\Livewire\Ujian;

use App\Models\Exam;
use App\Models\Ujian;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class User extends Component
{
    use LivewireAlert;
    public Ujian $ujian;
    public ?Exam $exam;

    public $user_id;
    public $showDescription = false;
    public $nilai = 0;
    public $benar = 0;
    public $salah = 0;
    public $jawaban = [];
    public $answers = [];
    public $bobot = 0;
    public $no = 1;

    public function mount(Ujian $ujian){
        $this->user_id = Auth::id();
        $this->ujian = $ujian;

        $this->exam = $this->ujian->exams->where('user_id', $this->user_id)->first();
        $this->bobot = $ujian->quizzes->count() ? 100 / $ujian->quizzes->count() : 0;
        $this->answers = $ujian->quizzes->pluck('answer', 'id')->toArray();

        if ($this->exam) {
            $this->jawaban = $this->exam->data['jawaban'];
        }
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

    public function simpan()
    {
        $this->validate([
            'jawaban.*' => 'required'
        ]);

        $this->reset(['nilai', 'benar', 'salah']);
        foreach ($this->jawaban as $key => $value) {
            if($this->jawaban[$key] == $this->answers[$key]) {
                $this->benar += 1;
                $this->nilai += $this->bobot;
            }
            else{
                $this->salah += 1;
            }
        }

        $this->exam->update([
            'data' => [
                'jawaban' => $this->jawaban,
                'benar' => $this->benar,
                'salah' => $this->salah,
                'nilai' => $this->nilai,
            ],
        ]);

        $this->alert("success", 'Jawaban disimpan');
    }

    public function selesai(){
        $this->simpan();
        $quizCount = $this->ujian->quizzes->count();
        $jawabanCount = count($this->jawaban);

        switch ($quizCount) {
            case $jawabanCount:
                $this->exam->update([
                    'selesai' => true
                ]);
                break;

            default:
                $this->alert('error', 'Anda belum selesai mengerjakan ujian');
                break;
        }
    }

    public function render()
    {
        return view('livewire.ujian.user');
    }
}
