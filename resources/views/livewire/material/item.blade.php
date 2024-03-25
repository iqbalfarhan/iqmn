<div class="card card-compact w-full shadow-lg bg-base-200">
    <figure class="bg-base-300">
        <img src="{{ $material->image_url }}" alt="{{ $material->image_url }}" class="w-full">
    </figure>
    <div class="card-body">
        <div class="flex justify-between gap-2">
            <h3 class="text-lg line-clamp-2">{{ $material->title }}</h3>
            <a href="{{ route('material.show', $material->id) }}" class="btn btn-circle" wire:navigate>
                <x-tabler-external-link class="w-5 h-5" />
            </a>
        </div>
        <small>{{ $material->created_at->diffForHumans() }}</small>
    </div>
</div>
