<div class="page-wrapper">
    <form class="text-sm" wire:submit.prevent="pencarian">
        <div class="w-full max-w-xl">
            <h1 class="text-xl font-bold">Cari material</h1>
            <p class="py-4 opacity-50">
                Hai.. kamu bisa mulai mencari materi belajar dengan menuliskan topik materi yang ingin kamu cari.
            </p>
            <div class="flex gap-2">
                <input type="text" class="input input-bordered w-full @error('cari') input-error @enderror"
                    placeholder="Cari dengan judul" wire:model="cari">
                <button class="btn btn-primary btn-circle">
                    <x-tabler-search class="size-5" />
                </button>
            </div>
        </div>
    </form>

    @if ($cari)
        <div>Hasil pencarian dengan keyword : {{ $cari }}</div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($datas as $data)
                @livewire('material.item', ['material' => $data], key($data->id))
            @empty
                <div class="col-span-full">
                    @livewire('partial.nocontent')
                </div>
            @endforelse
        </div>
    @endif

</div>
