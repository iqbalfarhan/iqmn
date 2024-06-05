<div class="page-wrapper space-y-10">
    <div class="space-y-4">
        <h2 class="text-xl font-bold capitalize">{{ $group->name }}</h2>
        @livewire('group.item', ['group' => $group])
    </div>

    @if ($group->materials->count() != 0)
        <div class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold">Material group</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($group->materials as $material)
                    @livewire('material.item', ['material' => $material], key($material->id))
                @endforeach
            </div>
        </div>
    @endif

    <div class="space-y-4">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold">Anggota group</h2>
            <div class="flex">
                @can('group.addUserToGroup')
                    <button wire:click="$dispatch('addToGroup', {group: {{ $group->id }}})" class="btn btn-sm btn-link">
                        <x-tabler-plus class="size-5" />
                        <span>Add user</span>
                    </button>
                @endcan
            </div>
        </div>
        <div class="flex overflow-x-auto scrollbar-hide -space-x-4 rtl:space-x-reverse">
            @foreach ($group->users as $user)
                {{-- @livewire('user.item', ['user' => $user], key($user->id)) --}}
                <div class="avatar">
                    <div class="w-16 rounded-full bg-base-300">
                        <img src="{{ $user->image_url }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @livewire('group.add-user')
</div>
