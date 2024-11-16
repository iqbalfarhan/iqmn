<div class="">
    <div class="page-wrapper-xl">
        <div class="flex flex-col md:flex-row-reverse items-center justify-center gap-10 md:gap-0">
            <div class="flex-1 hidden md:flex justify-center items-center">
                {{-- <img src="{{ url('illustration5.svg') }}" alt="" class="max-w-full mb-20"> --}}
                @livewire('partial.illustration')
            </div>
            <div class="flex-1 flex flex-col space-y-16 md:space-y-10 text-center md:text-left bg-radial-primary">
                <h1 class="font-bold text-6xl">Yuk, Belajar Lebih banyak</h1>
                <p class="text-lg">IQMN adalah alat bantu belajar Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Aspernatur eos tempore in adipisci! Rerum, voluptatum.</p>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    <a href="{{ route('article.index') }}" class="btn btn-primary btn-lg" wire:navigate>
                        <span>Baca article </span>
                        <x-tabler-book size="5" />
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-outline">
                        <span>Masuk member</span>
                        <x-tabler-login size="5" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper-xl">
        <div class="text-center space-y-2 max-w-2xl mx-auto">
            <h1 class="text-4xl font-extrabold text-center">Status pencapaian</h1>
            <p class="opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit optio hic qui
                officiis, et beatae quo
                minima a vel! Blanditiis.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-y-10 md:gap-x-10">
            @foreach ($status as $key => $value)
                <div class="flex-1 flex flex-col justify-center items-center gap-2">
                    <div class="font-mono font-extrabold text-7xl text-primary bg-radial-primary">{{ $value }}
                    </div>
                    <div class="text-xl capitalize">{{ $key }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="page-wrapper-xl">
        <div class="text-center space-y-2 max-w-2xl mx-auto">
            <h1 class="text-4xl font-extrabold text-center">Artikel terbaru</h1>
            <p class="opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit optio hic qui
                officiis, et beatae quo
                minima a vel! Blanditiis.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
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

        <div class="flex justify-center items-center">
            <a href="{{ route('article.index') }}" class="btn btn-primary btn-lg" wire:navigate>
                <span>Baca article lainnya</span>
                <x-tabler-book size="5" />
            </a>
        </div>
    </div>


    <div class="page-wrapper-xl" id="review">
        <div class="text-center space-y-2 max-w-2xl mx-auto">
            <h1 class="text-4xl font-extrabold text-center">Review dari anggota kelas</h1>
            <p class="opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit optio hic qui
                officiis, et beatae quo
                minima a vel! Blanditiis.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-14">
            @foreach ($reviews as $key => $review)
                <div class="text-center px-10 space-y-4">
                    <div class="avatar">
                        <div class="w-32 rounded-full bg-primary">
                            <img src="https://robohash.org/{{ $key }}.png?size=200x200" class="rounded-xl">
                        </div>
                    </div>
                    <div class="text-xl font-bold line-clamp-1">{{ $review['name'] }}</div>
                    <div class="line-clamp-3 opacity-75">{{ $review['text'] }}</div>
                    <div class="rating">
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-warning" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-warning" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-warning" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-warning" />
                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-warning" />
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    @livewire('partial.footer')

</div>
