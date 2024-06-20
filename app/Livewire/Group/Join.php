<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Join extends Component
{
    public function mount($code)
    {
        $group = Group::where('code', $code)->first();

        $user = Auth::user();
        if ($user) {
            if (!in_array($group->id, $user->groups->pluck('id')->toArray())) {
                $user->groups()->attach($group->id);
            }
            $this->redirect(route('group.mine'), true);
        }
        else{
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.group.join');
    }
}
