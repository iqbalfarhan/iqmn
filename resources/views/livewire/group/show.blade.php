<div class="page-wrapper space-y-6">
    <div class="space-y-4">
        <h2 class="text-xl font-bold capitalize">{{ $group->name }}</h2>
        @livewire('group.item', ['group' => $group])
    </div>

    <div class="space-y-4">
        <div class="flex justify-between items-end">
            <h2 class="text-xl font-bold">Anggota group</h2>
            @can('group.addUserToGroup')
                <button wire:click="$dispatch('addToGroup', {group: {{ $group->id }}})" class="btn btn-primary">
                    <x-tabler-plus class="size-5" />
                    <span>add user to group</span>
                </button>
            @endcan
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @foreach ($group->users as $user)
                @livewire('user.item', ['user' => $user], key($user->id))
            @endforeach
        </div>
    </div>


    @livewire('group.add-user')
</div>
