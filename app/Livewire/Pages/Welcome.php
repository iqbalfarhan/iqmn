<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.pages.welcome', [
            'posts' => Post::where('show', true)->latest()->limit(4)->get()
        ]);
    }
}
