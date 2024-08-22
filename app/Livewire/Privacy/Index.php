<?php

namespace App\Livewire\Privacy;

use Livewire\Component;

class Index extends Component
{
    public $content;

    public function mount($appname){
        $this->content = file_get_contents(base_path("markdowns/".$appname.".md"));
    }

    public function render()
    {
        return view('livewire.privacy.index');
    }
}
