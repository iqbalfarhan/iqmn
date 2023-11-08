<?php

namespace App\Livewire\Partial;

use Illuminate\Foundation\Inspiring;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.partial.footer', [
            'content' => Inspiring::quote()
        ]);
    }
}
