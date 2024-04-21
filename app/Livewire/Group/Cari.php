<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;

class Cari extends Component
{
    public $show = false;
    public $cari;

    #[On('searchGroup')]
    public function searchGroup(){
        $this->show = true;
    }

    #[On('closeSearchGroup')]
    public function closeSearchGroup(){
        $this->show = false;
    }

    public function render()
    {
        $included = auth()->user()->groups->pluck('id');
        return view('livewire.group.cari', [
            'datas' => $this->cari ? Group::whereNotIn('id', $included)->where('name', 'like', "%{$this->cari}%")->get() : null
        ]);
    }
}
