<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public function toggleShowPost(Post $post)
    {
        $post->show = !$post->show;
        $post->save();
    }

    public function delete(Post $post)
    {
        $post->delete();
    }

    public function render()
    {
        return view('livewire.post.index', [
            'datas' => Post::latest()->get()
        ]);
    }
}
