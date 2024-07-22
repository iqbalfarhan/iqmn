<div class="page-wrapper">
    <div class="card w-full py-6 md:py-12 space-y-4">
        <h3 class="text-3xl font-bold">Cari topik artikel</h3>
        <p>Cari topik artikel disini, tuliskan kata singkat mengenai topik bahasan. saran nih, coba untuk tuliskan
            "laravel"</p>

        <input type="search" class="input" wire:model.live="search" placeholder="Tulis topik disini">
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($posts as $post)
            <a href="{{ route('article.show', $post->slug) }}" wire:key="{{ $post->id }}" wire:navigate>
                @livewire('article.item', ['post' => $post], key($post->id))
            </a>
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent')
            </div>
        @endforelse
    </div>
</div>
