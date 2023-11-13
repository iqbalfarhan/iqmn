<div class="space-y-8">
    <div class="flex flex-col justify-between items-center gap-4">
        <div>
            <button class="avatar" wire:click="$dispatch('editProfile', {edittype: 'photo'})">
                <div class="w-24 rounded-full">
                    <img src="{{ $user->image_url }}" />
                </div>
            </button>
        </div>
        <button class="btn btn-ghost normal-case btn-lg" wire:click="$dispatch('editProfile', {edittype: 'info'})">
            <div class="flex flex-col">
                <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                <span class="text-sm">{{ $user->email }}</span>
            </div>
        </button>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Layout settings:</h3>
        <ul class="menu bg-base-200 rounded-xl">
            <li>
                <label class="justify-between">
                    <span>Stacked sidebar</span>
                    <input type="checkbox" class="toggle" wire:model.live="sidebar">
                </label>
            </li>
            <li></li>
            <li>
                <label class="justify-between">
                    <span>Enable dark mode</span>
                    <input type="checkbox" class="toggle" wire:model.live="theme">
                </label>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Account settings:</h3>
        <ul class="menu bg-base-200 rounded-xl">
            <li>
                <div class="justify-between">
                    <span>Change password</span>
                    <button class="btn btn-xs btn-outline"
                        wire:click="$dispatch('editProfile', {edittype: 'password'})">Update</button>
                </div>
            </li>
            <li></li>
            <li>
                <label class="justify-between">
                    <span>Delete account</span>
                    <button class="btn btn-error btn-xs btn-outline">Delete</button>
                </label>
            </li>
        </ul>
    </div>

    @livewire('user.profile')

</div>
