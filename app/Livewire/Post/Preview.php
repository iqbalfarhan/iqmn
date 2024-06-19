<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Preview extends Component
{
    public $show = false;
    public ?Post $post;

    #[On('previewPost')]
    public function previewPost(Post $post)
    {
        $this->show = true;
        $this->post = $post;
    }

    public function closeModal()
    {
        $this->reset([
            'post',
            'show',
        ]);
    }

    public function render()
    {
        return view('livewire.post.preview');
    }
}
