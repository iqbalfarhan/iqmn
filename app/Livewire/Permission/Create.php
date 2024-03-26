<?php

namespace App\Livewire\Permission;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    use LivewireAlert;
    public $name;
    public $show = false;
    public $model = "permission";

    public ?Permission $permission;
    public ?Role $role;

    #[On('createPermission')]
    public function createPermission(){
        $this->model = "permission";
        $this->show = true;
    }

    #[On('editPermission')]
    public function editPermission(Permission $permission){
        $this->model = "permission";
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->show = true;
    }

    #[On('createRole')]
    public function createRole(){
        $this->model = "role";
        $this->show = true;
    }

    #[On('editRole')]
    public function editRole(Role $role){
        $this->model = "role";
        $this->role = $role;
        $this->name = $role->name;
        $this->show = true;
    }

    public function resetForm(){
        $this->reset();
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required'
        ]);

        if ($this->model == "permission") {
            if (isset($this->permission)) {
                $this->permission->update($valid);
            }
            else{
                Permission::create($valid);
            }
            $this->alert('success', 'berhasil menambahkan permission baru');
        }
        elseif ($this->model == "role") {
            if (isset($this->role)) {
                $this->role->update($valid);
            }
            else{
                Role::create($valid);
            }
            $this->alert('success', 'berhasil menambahkan role baru');
        }

        $this->dispatch('reload');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.permission.create');
    }
}
