<?php

namespace App\Livewire\Forms;

use App\Helpers\UtilsHelper;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    public $name;
    public $logo;
    public $user_id;
    public $desc;
    public $code;
    public ?Group $group;

    public function setGroup(Group $group){
        $this->group = $group;

        $this->name = $group->name;
        $this->user_id = $group->user_id;
        $this->desc = $group->desc;
        $this->code = $group->code;
    }

    public function store()
    {
        $valid = $this->validate([
            'name' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
            'code' => 'required|unique:groups,code',
        ]);

        if ($this->logo) {
            $valid['logo'] = $this->logo;
        }

        $group = Group::create($valid);
        $group->users()->attach(auth()->id());
        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'name' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
            'code' => 'required',
        ]);

        if ($this->logo) {
            $valid['logo'] = $this->logo;
        }

        $this->group->update($valid);
        $this->reset();
    }

    public function generateCode(){
        $this->code = UtilsHelper::randomCode();
    }
}
