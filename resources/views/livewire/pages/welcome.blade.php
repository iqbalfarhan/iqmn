@if ($posts->count() > 0)
    <div class="page-wrapper">
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($posts as $post)
                <a href="{{ route('article.show', $post->slug) }}" wire:navigate class="flex flex-col space-y-3">
                    <div class="aspect-auto">
                        <img src="{{ $post->image_url }}" class="rounded-xl">
                    </div>

                    <div class="text-xl font-bold line-clamp-3">{{ $post->title }}</div>

                    <div class="flex items-center opacity-75">
                        <div class="flex gap-2 flex-1">
                            <div class="avatar size-5">
                                <div class="w-5 rounded-full">
                                    <img src="{{ $post->user->image_url }}" alt="">
                                </div>
                            </div>
                            <div class="text-sm">{{ Str::words($post->user->name, 2, '') }}</div>
                        </div>
                        <div class="text-xs">{{ $post->created_at->format('d M Y') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@else
    <div class="min-h-full flex flex-col items-center justify-center">
        <h2>Selamat datang di</h2>
        @livewire('partial.logo')
    </div>
@endif
