<div class="">
    <div class="page-wrapper">
        <div class="grid lg:grid-cols-2 gap-2 md:gap-6">
            @livewire('user.item', ['user' => $user])
            @livewire('widget.tanggal')
        </div>
    </div>

    <div class="page-wrapper md:hidden">
        <div class="grid grid-cols-4 md:grid-cols-8 gap-4">
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('material.cari') }}" class="btn btn-lg btn-circle">
                    <x-tabler-search class="size-7" />
                </a>
                <span class="text-xs">Cari</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('material.comot') }}" class="btn btn-lg btn-circle">
                    <x-tabler-book class="size-7" />
                </a>
                <span class="text-xs">Materiku</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('group.mine') }}" class="btn btn-lg btn-circle">
                    <x-tabler-users class="size-7" />
                </a>
                <span class="text-xs">Groupku</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('profile') }}" class="btn btn-lg btn-circle">
                    <x-tabler-user-hexagon class="size-7" />
                </a>
                <span class="text-xs">Profile</span>
            </div>
        </div>
    </div>

    @if ($user->groups->count() > 0)
        <div class="page-wrapper">
            <div class="space-y-4">
                <h1 class="text-xl">Groupku <small>({{ $user->groups->count() }} group)</small></h1>
                <div class="flex flex-col gap-2">
                    @foreach ($user->groups as $group)
                        @livewire('group.item', ['group' => $group, 'showToggleJoin' => false], key($group->id))
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
                    <div class="min-w-80 max-w-80">
                        @livewire('material.item', ['material' => $material], key($material->id))
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
