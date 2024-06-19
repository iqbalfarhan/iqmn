<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
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
    public $media;
    public $tags;
    public PostForm $form;

    public function simpan()
    {
        if($this->photo) {
            $this->photo->store('post/'.$this->post->id);
            $this->form->photo = $this->photo->hashName('post/'.$this->post->id);
        }

        $this->form->validate([
            'user_id' =>'required',
            'title' =>'required',
            'slug' =>'required',
        ]);

        if ($this->tags) {
            $this->form->tags = array_map('trim', explode(',', $this->tags));
        }

        $this->form->slug = Str::slug($this->form->title);
        $this->form->update();

        $this->reset('photo');
        $this->reset('media');

        $this->alert('success', "Berhasil memperbarui data postingan");
    }

    public function uploadMedias()
    {
        $this->validate([
            'media' => 'required'
        ]);

        foreach($this->media as $media)
        {
            $media->store('post/'.$this->post->id);
        }

        $this->reset('media');
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->form->setPost($post);
        $this->tags = $this->form->tags;
    }

    public function render()
    {
        return view('livewire.post.edit', [
            'medias' => Storage::files('post/'.$this->post->id) ?? [],
        ]);
    }
}
