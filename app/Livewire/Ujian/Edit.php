<?php

namespace App\Livewire\Ujian;

use App\Models\Quiz;
use App\Models\Ujian;
use Livewire\Component;

class Edit extends Component
{
    public Ujian $ujian;

    public $active_tab = 'keterangan';

    public function mount(Ujian $ujian){
        $this->ujian = $ujian;
    }

    public function render()
    {
        return view('livewire.ujian.edit', [
            'quizzes' => Quiz::where('ujian_id', $this->ujian->id)->get(),
            'tabs' => ['keterangan', 'quiz']
        ]);
    }
}
