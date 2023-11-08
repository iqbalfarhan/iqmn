<div class="space-y-6">
    <div class="flex flex-col lg:flex-row justify-between gap-4">
        <h3 class="text-3xl font-bold">{{ $material->title }}</h3>
        <div class="flex gap-1">
            <a href="{{ $material->url }}" class="btn" target="_blank">
                <x-tabler-external-link class="w-5 h-5" />
                <span>Buka material</span>
            </a>
        </div>
    </div>
    
    
    <article class="prose prose-lg mx-auto">
        <button class="btn" wire:click.prevent="attachMaterial">
            <x-tabler-heart class="w-5 h-5" />
            <span>favorite</span>
        </button>
        <button class="btn" wire:click.prevent="attachMaterial">
            <x-tabler-heart-broken class="w-5 h-5" />
            <span>unfavorite</span>
        </button>

        <figure>
            <img src="{{ $material->image_url }}" alt="" class="w-full rounded-xl">
        </figure>
        {!! Str::markdown($material->description) !!}

        <div class="flex flex-wrap gap-1">
            <button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>PHP</span>
            </button>
            <button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>Laravel</span>
            </button>
            <button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>Algoritma</span>
            </button>
            <button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>Algoritma</span>
            </button><button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>Algoritma</span>
            </button><button class="btn btn-sm">
                <x-tabler-tag class="w-5 h-5" />
                <span>Basic Programming</span>
            </button>
        </div>
    </article>

    <div class="divider"></div>
    
    <div class="space-y-6">
        <button class="btn">
            <x-tabler-edit class="w-5 h-5" />
            <span>Tambahkan komentar</span>
        </button>

        @livewire('partial.chat')
        @livewire('partial.chat')
        @livewire('partial.chat')
        @livewire('partial.chat')
    </div>
</div>
