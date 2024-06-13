<?php

namespace App\Livewire\Pages;

use App\Models\Group;
use App\Models\Material;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        $status = [
            'member' => User::role('reader')->count(),
            'kelas' => Group::count(),
            'pengajar' => User::role('author')->count(),
            'materi' => Material::count(),
            'article' => Post::count(),
        ];

        $reviews = [];

        for ($i=0; $i < 3; $i++) {
            $reviews[] = [
                "name" => fake()->name(),
                "text" => fake()->sentence(30),
                "star" => fake()->numberBetween(4, 5),
            ];
        }

        return view('livewire.pages.welcome', [
            'posts' => Post::where('show', true)->latest()->limit(4)->get(),
            'status' => $status,
            'reviews' => $reviews
        ]);
    }
}
