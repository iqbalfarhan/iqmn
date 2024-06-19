<?php

namespace App\Livewire\Article;

use App\Models\Post;
use Livewire\Component;

class Read extends Component
{
    public ?Post $post;

    public function mount($slug){
        $this->post = Post::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.article.read', [
            'terkaits' => $this->post->tags ? Post::whereNot('id', $this->post->id)->jsonContainsIn('tags', $this->post->tags)->get() : []
        ]);
    }
}
