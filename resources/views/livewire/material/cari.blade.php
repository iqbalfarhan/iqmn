<div>
    <div class="bg-base-200">
        <div class="page-wrapper">
            <form class="w-full text-sm mx-auto" wire:submit.prevent="pencarian">
                <h1 class="text-xl font-bold">Pencarian material</h1>
                <p class="py-4 opacity-50">
                    Hai.. kamu bisa mulai mencari materi belajar dengan menuliskan topik materi yang ingin kamu cari.
                </p>
                <div class="flex gap-2">
                    <input type="search"
                        class="input bg-base-100 input-bordered w-full @error('cari') input-error @enderror"
                        placeholder="Cari dengan judul" wire:model="cari">
                    <button class="btn btn-primary btn-circle">
                        <x-tabler-search class="size-5" />
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="page-wrapper">

        @if ($cari)
            <div>Hasil pencarian dengan keyword : {{ $cari }}</div>
        @else
            <div>Material yang baru diupload :</div>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-6">
            @forelse ($datas as $data)
                <a href="{{ route('material.show', $data) }}">
                    @livewire('material.item', ['material' => $data], key($data->id))
                </a>
            @empty
                <div class="col-span-full">
                    @livewire('partial.nocontent')
                </div>
            @endforelse
        </div>

    </div>

</div>
