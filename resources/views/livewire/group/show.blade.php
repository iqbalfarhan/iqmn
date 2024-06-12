<div class="page-wrapper space-y-10">
    <div class="space-y-4">
        <h2 class="text-xl font-bold capitalize">{{ $group->name }}</h2>
        @livewire('group.item', ['group' => $group, 'showToggleJoin' => false])
    </div>

    @if ($group->materials->count() != 0)
        <div class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold">Material kelas</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-2 md:gap-6">
                @foreach ($group->materials as $material)
                    <a href="{{ route('material.show', $material) }}">
                        @livewire('material.item', ['material' => $material], key($material->id))
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <div class="space-y-4">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold">Anggota kelas</h2>
        </div>
        {{-- <div class="flex overflow-x-auto scrollbar-hide gap-4 px-6"> --}}
        <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
            @foreach ($group->users as $user)
                <div class="avatar">
                    <div class="w-full rounded-full bg-base-300">
                        <img src="{{ $user->image_url }}" alt="">
                    </div>
                </div>
            @endforeach
            @can('group.addUserToGroup')
                <button class="avatar placeholder" wire:click="$dispatch('addToGroup', {group: {{ $group->id }}})"
                    class="btn btn-sm btn-link">
                    <div class="w-full bg-base-200 text-base-200-content rounded-full">
                        <x-tabler-plus class="size-7" />
                    </div>
                </button>
            @endcan
        </div>
    </div>

    @livewire('group.add-user')
</div>
