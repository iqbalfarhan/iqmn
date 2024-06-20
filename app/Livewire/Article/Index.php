<?php

namespace App\Livewire\Article;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $search;

    protected function queryString()
    {
        return [
            'search' => [
                'as' => 'q',
            ],
        ];
    }

    public function mount()
    {
        $this->search = $this->search ?? null;
    }

    public function render()
    {
        return view('livewire.article.index', [
            'posts' => Post::when($this->search, function($post){
                return $post->jsonContainsIn('tags', [$this->search])->orWhere('title', 'like', "%".$this->search."%");
            })->where('show', true)->latest()->limit(30)->get()
        ]);
    }
}
