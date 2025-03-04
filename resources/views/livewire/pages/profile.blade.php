<div class="page-wrapper space-y-10">
    <div class="flex flex-col justify-between items-center gap-4">
        <div>
            <button class="avatar" wire:click="$dispatch('editProfile', {edittype: 'photo'})">
                <div class="w-28 rounded-full">
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
        <ul class="menu rounded-box bg-base-200">
            <li>
                <label class="justify-between">
                    <span>Stacked sidebar</span>
                    <input type="checkbox" class="toggle" wire:model.live="sidebar">
                </label>
            </li>
            <li></li>
            <li>
                <div class="justify-between">
                    <span>Change theme</span>
                    <button class="btn btn-xs" wire:click="dispatch('selectTheme')">
                        {{ Str::ucfirst($theme) }}
                        <div class="flex">
                            <div class="size-3 rounded-full bg-primary"></div>
                            <div class="size-3 rounded-full bg-secondary"></div>
                            <div class="size-3 rounded-full bg-neutral"></div>
                        </div>
                    </button>
                </div>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Account settings:</h3>
        <ul class="menu rounded-box bg-base-200">
            <li>
                <div class="justify-between">
                    <span>Github</span>
                    <button class="btn btn-xs btn-ghost hover:btn-outline normal-case"
                        wire:click="$dispatch('editProfile', {edittype: 'github'})">
                        {{ Str::limit($user->sosmeds()->where('name', 'github')->first()->link ?? 'Your github link', 30) }}
                    </button>
                </div>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Danger zone:</h3>
        <ul class="menu rounded-box bg-base-200">
            <li>
                <div class="justify-between">
                    <span>Ganti password</span>
                    <button class="btn btn-xs btn-outline"
                        wire:click="$dispatch('editProfile', {edittype: 'password'})">Update</button>
                </div>
            </li>
            <li></li>
            <li>
                <label class="justify-between" wire:click="$dispatch('reload')"
                    wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
                    <span>Hapus akun</span>
                    <button class="btn btn-error btn-xs btn-outline">Delete</button>
                </label>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Keluar aplikasi:</h3>
        <button class="btn btn-error btn-block" wire:click="$dispatch('logout')">
            <x-tabler-logout class="size-5" />
            <span>Logout</span>
        </button>
    </div>

    @livewire('user.profile')
    @livewire('partial.select-theme')

</div>
