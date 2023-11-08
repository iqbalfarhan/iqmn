<div class="space-y-6">
    <div class="space-y-4">
        <h1 class="text-xl">Material belajar saya</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($materials as $material)
                @livewire('material.item', ['material' => $material], key($material->id))
            @endforeach
        </div>
    </div>    
</div>