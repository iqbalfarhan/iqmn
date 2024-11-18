<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $code;
    public $email;
    public $password;

    public $showPassword = false;

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function register()
    {
        $valid = $this->validate([
            'email' => 'email|required',
            'name' => 'required',
            'password' => 'required',
            'code' => 'required|in:'.config('material.regist_code'),
        ]);

        $valid == Arr::pull($valid, 'code');

        $user = User::create($valid);
        $user->assignRole('pelajar');

        if (Auth::loginUsingId($user->id)) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
