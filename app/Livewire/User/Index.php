<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.user.index', [
            'datas' => User::get()
        ]);
    }
}
