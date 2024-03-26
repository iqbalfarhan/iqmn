<div class="page-wrapper">
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="stats shadow-lg">
            <div class="stat">
                <div class="stat-figure">
                    <div class="avatar">
                        <div class="w-16 rounded-full">
                            <img src="{{ $user->image_url }}" />
                        </div>
                    </div>
                </div>
                <div class="stat-value text-primary">{{ config('app.name') }}</div>
                <div class="stat-title">{{ $user->name }}</div>
                <div class="stat-desc">{{ $user->email }}</div>
            </div>
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
