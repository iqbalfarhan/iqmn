<?php

namespace App\Livewire\Article;

use App\Models\Post;
use Livewire\Component;

class Card extends Component
{
    public Post $post;
    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.article.card');
    }
}
