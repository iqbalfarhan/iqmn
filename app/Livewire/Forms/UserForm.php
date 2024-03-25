<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $role;

    public ?User $user;

    public function setUser(User $user){
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first();
    }

    public function update(){
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->user->syncRoles($this->role);
        $this->reset();
    }
}
