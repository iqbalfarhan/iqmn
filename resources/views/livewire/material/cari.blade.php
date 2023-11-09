<div class="space-y-6">
    <div class="card bg-base-200 rounded-xl">
        <form class="card-body text-center" wire:submit.prevent="pencarian">
            <div class="max-w-xl py-6 mx-auto space-y-4">
                <h1 class="text-5xl font-bold">Cari material</h1>
                <p class="py-6">
                    Silakan tulis nama materi yang ingin kamu cari. input minimial 5 karakter ya. kamu juga bisa cari
                    dengan
                    tag material. Tag biasanya disesuaikan dengan bahasan materi.
                </p>
                <div class="flex gap-2">
                    <input type="text" class="input w-full @error('cari') input-error @enderror"
                        placeholder="Cari dengan judul" wire:model="cari">
                    <button class="btn btn-primary btn-square">
                        <x-tabler-search class="w-5 h-5" />
                    </button>
                </div>
            </div>
        </form>
    </div>

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
