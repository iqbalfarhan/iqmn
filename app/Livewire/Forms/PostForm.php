<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required')]
    public $user_id;

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $slug;

    #[Validate('')]
    public $body;

    #[Validate('')]
    public $tags;

    #[Validate('')]
    public $photo;

    #[Validate('required')]
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

    public function store()
    {
        $this->validate();
        Post::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->post->update($this->all());
    }
}
