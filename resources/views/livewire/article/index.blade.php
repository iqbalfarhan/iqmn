<div class="page-wrapper">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($posts as $post)
            <a href="{{ route('article.show', $post->slug) }}" wire:key="{{ $post->id }}" wire:navigate>
                @livewire('article.item', ['post' => $post])
            </a>
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent')
            </div>
        @endforelse
    </div>
</div>
