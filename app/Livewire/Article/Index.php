<?php

namespace App\Livewire\Article;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.article.index', [
            'posts' => Post::where('show', true)->latest()->get()
        ]);
    }
}
