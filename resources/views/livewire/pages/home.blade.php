<div class="page-wrapper">
    <div class="grid lg:grid-cols-2 gap-6">
        @livewire('user.item', ['user' => $user])
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
