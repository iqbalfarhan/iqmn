<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Article extends Component
{
    public Post $post;

    public function mount($slug){
        $this->post = Post::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.pages.article');
    }
}
