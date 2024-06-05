<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public $user_id;

    public $title;

    public $slug;

    public $body = "";

    public $tags;

    public $photo;

    public $show = false;


    public ?Post $post;

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->user_id = $post->user_id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->tags = $post->tags;
        $this->photo = $post->photo;
        $this->show = $post->show;
    }

    public function update()
    {
        $this->validate([
            'user_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'tags' => '',
            'photo' => '',
            'show' => '',
        ]);
        $this->post->update($this->all());
    }
}
