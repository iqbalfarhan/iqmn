<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{

    public function logout(){
        
        if (Auth::logout()) {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
