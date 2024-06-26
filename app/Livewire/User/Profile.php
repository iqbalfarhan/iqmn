<?php

namespace App\Livewire\User;

use App\Models\Sosmed;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use LivewireAlert, WithFileUploads;

    public $show = false;
    public $edittype = "info";
    public $name;
    public $email;
    public $photo;
    public $github;
    public $password;

    #[On('editProfile')]
    public function editProfile($edittype)
    {
        $this->edittype = $edittype;
        $this->show = true;

        $user = auth()->user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->github = $user->sosmeds()->where('name', 'github')->first()->link ?? "";
    }

    public function simpan()
    {
        $user = User::find(auth()->id());
        if ($this->edittype == "photo") {
            $valid = $this->validate([
                'photo' => 'required'
            ]);

            $filename = $this->photo->hashName('user');
            $image = Image::make($this->photo)->fit(500)->encode('jpg', 100);

            Storage::put($filename, $image);

            $valid['photo'] = $filename;

            $user->update($valid);
        } elseif ($this->edittype == "info") {
            $valid = $this->validate([
                'name' => 'required',
                'email' => 'required'
            ]);

            $user->update($valid);
        } elseif ($this->edittype == "github") {
            $valid = $this->validate([
                'github' => 'required',
            ]);

            Sosmed::updateOrCreate([
                'user_id' => $user->id,
                'name' => 'github'
            ], [
                'link' => $valid['github']
            ]);
        } elseif ($this->edittype == "password") {
            $valid = $this->validate([
                'password' => 'required'
            ]);
            $valid['password'] = Hash::make($this->password);

            $user->update($valid);
        }

        $this->reset();
        $this->dispatch('reload');
        $this->alert('success', $this->edittype . ' berhasil diupdate');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
