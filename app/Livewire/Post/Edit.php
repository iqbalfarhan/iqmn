<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public Post $post;
    public $photo;
    public PostForm $form;

    public function simpan()
    {
        if($this->photo) {
            $this->photo->store('post/'.$this->post->id);
            $this->form->photo = $this->photo->hashName('post/'.$this->post->id);
        }

        $this->form->slug = Str::slug($this->form->title);
        $this->form->update();

        $this->alert('success', "Berhasil memperbarui data postingan");

        $this->mount($this->post);
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->form->setPost($post);
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
