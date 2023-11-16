<?php

namespace App\Livewire\Git;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $output;

    public function stash()
    {
        $output = shell_exec('git stash');
        $this->output = $output;
        $this->alert('success', 'Git stash berhasil');
    }

    public function pull()
    {
        $output = shell_exec('git pull');
        $this->output = $output;
        $this->alert('success', 'Git pull berhasil');
    }

    public function render()
    {
        return view('livewire.git.index');
    }
}
