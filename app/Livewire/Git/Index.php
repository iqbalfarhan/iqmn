<?php

namespace App\Livewire\Git;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $output;

    public function gitExec($command, $alert = false)
    {
        $output = shell_exec("git {$command}");
        if ($alert) {
            $this->alert('success', $output);
        }
        else{
            $this->output = $output;
        }
    }

    public function render()
    {
        return view('livewire.git.index');
    }
}
