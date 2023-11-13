<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Profile extends Component
{
    protected $listeners = ['reload' => '$refresh'];

    public User $user;
    public $theme;
    public $sidebar;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->theme = session('theme') == "light" ? false : true;
        $this->sidebar = session('sidebar') == "lg:drawer-open" ? true : false;
    }

    public function updatedTheme($theme)
    {
        $theme = $this->theme == true ? 'dark' : 'light';
        Session::put('theme', $theme);
        return redirect('/profile');
    }

    public function updatedSidebar($sidebar)
    {
        $sidebar = $this->sidebar == true ? 'lg:drawer-open' : '';
        Session::put('sidebar', $sidebar);
        return redirect('/profile');
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
