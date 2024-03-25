<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Actions extends Component
{
    public $show = false;
    public UserForm $form;

    #[On('editUser')]
    public function editUser(User $user){
        $this->show = true;
        $this->form->setUser($user);
    }

    #[On('deleteUser')]
    public function deleteUser(User $user)
    {
        $user->delete();
        $this->dispatch('reload');
    }

    public function resetUser(){
        $this->show = false;
        $this->form->reset();
    }

    public function simpan(){
        if (isset($this->form->user)) {
            $this->form->update();
        }

        $this->dispatch('reload');
        $this->resetUser();
    }

    public function render()
    {
        return view('livewire.user.actions', [
            'roles' => Role::pluck('name')
        ]);
    }
}
