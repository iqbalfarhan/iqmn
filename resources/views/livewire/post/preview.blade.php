<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-lg">
            @if ($post)
                <h1 class="font-bold text-3xl">{{ $post->title }}</h1>
                <div class="py-4">
                    <article class="prose mx-auto">
                        <img src="{{ $post->image_url }}" alt="">
                        {!! Str::markdown($post->body) !!}
                    </article>
                </div>
            @endif
            <div class="modal-action">
                <button wire:click="closeModal" class="btn">Close!</button>
            </div>
        </div>
        <s class="modal-backdrop" wire:click="closeModal">Close</s>
    </div>
</div>
