<div class="page-wrapper space-y-10">
    <div class="grid lg:grid-cols-2 gap-2 md:gap-6">
        @livewire('user.item', ['user' => $user])
        @livewire('widget.tanggal')
    </div>
    <div class="grid md:hidden grid-cols-4 md:grid-cols-8 gap-4">
        <div class="flex flex-col items-center justify-center gap-2">
            <a href="{{ route('material.cari') }}" class="btn btn-lg btn-circle">
                <x-tabler-search class="size-7" />
            </a>
            <span class="text-sm">Cari</span>
        </div>
        <div class="flex flex-col items-center justify-center gap-2">
            <a href="{{ route('material.comot') }}" class="btn btn-lg btn-circle">
                <x-tabler-book class="size-7" />
            </a>
            <span class="text-sm">Materiku</span>
        </div>
        <div class="flex flex-col items-center justify-center gap-2">
            <a href="{{ route('group.mine') }}" class="btn btn-lg btn-circle">
                <x-tabler-users class="size-7" />
            </a>
            <span class="text-sm">Groupku</span>
        </div>
        <div class="flex flex-col items-center justify-center gap-2">
            <a href="{{ route('profile') }}" class="btn btn-lg btn-circle">
                <x-tabler-user-hexagon class="size-7" />
            </a>
            <span class="text-sm">Profile</span>
        </div>
    </div>
    <div class="space-y-4">
        <h1 class="text-xl">Groupku <small>({{ $user->groups->count() }} group)</small></h1>
        <div class="flex gap-3 overflow-x-scroll scrollbar-hide">
            @foreach ($user->groups as $group)
                <a href="{{ route('group.show', $group) }}"
                    class="flex w-fit gap-3 bg-base-200 p-4 rounded-xl items-center" wire:navigate>
                    <div class="flex-none flex items-center justify-center">
                        <div class="avatar w-12 placeholder">
                            <div class="w-12 rounded-full bg-base-100 capitalize">
                                <span class="text-xl">{{ $group->name[0] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col flex-wrap">
                        <h2 class="text-lg font-bold truncate capitalize">{{ $group->name }}</h2>
                        <span class="text-xs">{{ $group->users->count() }} member</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="space-y-4">
        <h1 class="text-xl">Material belajarku <small>({{ $user->materials->count() }} materi)</small></h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($user->materials->take(3) as $material)
                @livewire('material.item', ['material' => $material], key($material->id))
            @endforeach
        </div>
    </div>
</div>
