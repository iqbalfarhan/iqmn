<div class="card bg-base-200 shadow">
    <figure>
        <img src="{{ $material->image_url }}" alt="{{ $material->image_url }}" class="aspect-video">
    </figure>
    <div class="card-body">
        <div class="flex gap-2">
            <h3 class="text-lg">{{ $material->title }}</h3>
            <a href="{{ route('material.show', $material->id) }}" class="btn btn-circle" wire:navigate>
                <x-tabler-external-link class="w-5 h-5" />
            </a>
        </div>

        <small>{{ $material->created_at->diffForHumans() }}</small>
    </div>
</div>