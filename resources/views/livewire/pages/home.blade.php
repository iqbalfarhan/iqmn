<div class="page-wrapper space-y-8">
    <div class="grid lg:grid-cols-2 gap-6">
        @livewire('user.item', ['user' => $user])
    </div>
    <div class="space-y-4">
        <h1 class="text-xl">Groupku <small>({{ $user->groups->count() }} group)</small></h1>
        <div class="flex gap-2 overflow-x-auto scrollbar-hide">
            @foreach ($user->groups as $group)
                <a href="{{ route('group.show', $group) }}" class="btn capitalize" wire:navigate>
                    <x-tabler-users-group class="size-5" />
                    {{ $group->name }}
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
