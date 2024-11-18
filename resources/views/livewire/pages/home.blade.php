<div class="space-y-0">
    <div class="page-wrapper">
        <div class="grid lg:grid-cols-2 gap-2 md:gap-6">
            @livewire('user.item', ['user' => $user])
            @livewire('widget.tanggal')
        </div>
    </div>

    <div class="page-wrapper md:hidden">
        <div class="grid grid-cols-4 md:grid-cols-8 gap-2">
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('material.cari') }}" class="btn btn-primary btn-square btn-lg">
                    <x-tabler-search class="size-6" />
                </a>
                <span class="text-xs">Cari</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('material.comot') }}" class="btn btn-secondary btn-square btn-lg">
                    <x-tabler-book class="size-6" />
                </a>
                <span class="text-xs">Materiku</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('group.mine') }}" class="btn btn-accent btn-square btn-lg">
                    <x-tabler-user-circle class="size-6" />
                </a>
                <span class="text-xs">Kelasku</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <label for="drawer" class="btn btn-neutral btn-square btn-lg">
                    <x-tabler-dots class="size-6" />
                </label>
                <span class="text-xs">Lainnya</span>
            </div>
        </div>
    </div>

    @if ($user->groups->count() > 0)
        <div class="page-wrapper">
            <div class="space-y-4">
                <h1 class="text-xl">Kelasku <small>({{ $user->groups->count() }} kelas)</small></h1>
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach ($user->groups as $group)
                        <a href="{{ route('group.show', $group) }}" wire:navigate>
                            @livewire('group.item', ['group' => $group, 'showToggleJoin' => false], key($group->id))
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($user->materials->count() > 0)
        <div class="space-y-4 py-6 mx-auto max-w-5xl">
            <h1 class="text-xl px-6">Material belajarku <small>({{ $user->materials->count() }} materi)</small></h1>
            <div class="flex overflow-x-auto scrollbar-hide gap-4 px-6">
                @foreach ($user->materials as $material)
                    <a href="{{ route('material.show', $material) }}" class="min-w-80 max-w-80">
                        @livewire('material.item', ['material' => $material], key($material->id))
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
