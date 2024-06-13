<div class="">
    <div class="page-wrapper-xl ">
        <div class="flex flex-col md:flex-row-reverse py-10 md:py-20 items-center gap-10 md:gap-0 bgradialprimary">
            <div class="flex-1 flex justify-center items-center">
                <img src="{{ url('illustration3.svg') }}" alt="" class="max-w-full">
            </div>
            <div class="flex-1 flex flex-col space-y-10 text-center md:text-left">
                <h1 class="font-bold text-6xl">Yuk, Belajar Lebih banyak</h1>
                <p class="text-lg">IQMN adalah alat bantu belajar Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Aspernatur eos tempore in adipisci! Rerum, voluptatum.</p>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    <button class="btn btn-primary btn-lg">
                        <span>Baca article </span>
                        <x-tabler-book size="5" />
                    </button>
                    <button class="btn btn-primary btn-lg btn-outline">
                        <span>Masuk member</span>
                        <x-tabler-login size="5" />
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div class="page-wrapper-xl">
        <div class="text-center space-y-2 max-w-2xl mx-auto">
            <h1 class="text-4xl font-extrabold text-center">Status pencapaian</h1>
            <p class="opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit optio hic qui
                officiis, et beatae quo
                minima a vel! Blanditiis.</p>
        </div>
        <div class="flex justify-evenly">
            @foreach ($status as $key => $value)
                <div class="flex-1 flex flex-col justify-center items-center gap-2">
                    <div class="font-mono font-extrabold text-7xl text-primary">{{ $value }}</div>
                    <div class="text-xl capitalize">{{ $key }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="divider"></div>
    <div class="page-wrapper-xl">
        <h1 class="text-4xl font-extrabold text-center">Artikel terbaru</h1>

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
    </div>


    <div class="divider"></div>
    <div class="page-wrapper-xl">
        <h1 class="text-4xl font-extrabold text-center">Testimony</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis rerum suscipit neque quam minus ullam,
            iste aliquid veritatis laborum odit sed, earum quos repellendus nisi molestiae dolore delectus quasi
            maiores.</p>
    </div>
    <div class="divider"></div>
    <div class="page-wrapper-xl">
        @livewire('partial.footer')
    </div>

</div>
