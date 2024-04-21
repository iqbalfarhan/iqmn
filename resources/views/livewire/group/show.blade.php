<div class="page-wrapper">
    <div class="space-y-4">
        <h2 class="text-xl font-bold capitalize">{{ $group->name }}</h2>
        @livewire('group.item', ['group' => $group])
    </div>

    <div class="space-y-4">
        <h2 class="text-xl font-bold">Anggota group</h2>
        <div class="grid md:grid-cols-2 gap-4">
            @foreach ($group->users as $user)
                @livewire('user.item', ['user' => $user])
            @endforeach
        </div>
    </div>
</div>
