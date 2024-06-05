<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    public $show = false;
    public PostForm $form;

    #[On('createPost')]
    public function createPost()
    {
        $this->show = true;
    }

    public function simpan()
    {
        $this->form->user_id = auth()->id();
        $this->form->slug = Str::slug($this->form->title);
        $this->form->body = $this->form->title;

        $this->form->validate([
            'user_id' =>'required',
            'title' =>'required',
            'slug' =>'required',
            'body' =>'required'
        ]);

        $post = Post::create($this->form->all());
        $this->redirect(route('post.edit', $post), true);
    }

    public function closeModal()
    {
        $this->form->reset();
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.post.actions');
    }
}
