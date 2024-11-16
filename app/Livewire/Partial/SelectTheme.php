<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectTheme extends Component
{
    public $themeList = [
        "light",
        "dark",
        "cupcake",
        "bumblebee",
        "emerald",
        "corporate",
        "synthwave",
        "retro",
        "cyberpunk",
        "valentine",
        "halloween",
        "garden",
        "forest",
        "aqua",
        "lofi",
        "pastel",
        "fantasy",
        "wireframe",
        "black",
        "luxury",
        "dracula",
        "cmyk",
        "autumn",
        "business",
        "acid",
        "lemonade",
        "night",
        "coffee",
        "winter",
        "dim",
        "nord",
        "sunset",
    ];

    public $show = false;

    #[On('selectTheme')]
    public function selectTheme(){
        $this->show = true;
    }

    public function closeModal(){
        $this->show = false;
    }

    public function ubahTema($theme)
    {
        Session::put('theme', $theme);
        // $this->redirect("/profile");
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.partial.select-theme');
    }
}
