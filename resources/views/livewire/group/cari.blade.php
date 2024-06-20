<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-sm">
            <h3 class="font-bold text-lg">Gabung dengan kelas</h3>
            <div class="w-full pt-6 mx-auto space-y-3">
                <p>Gabung dengan kelas sekarang, tuliskan kode kelas yang anda miliki dibawah ini kemudian klik pada
                    kelas yang tampil.</p>
                <input type="text" @class([
                    'input input-lg input-bordered w-full text-center',
                    'input-error' => $errors->first('cari'),
                ]) placeholder="Cari kode kelas" wire:model.live="cari">
                @isset($datas)
                    <div class="flex flex-col gap-2">
                        @forelse ($datas as $data)
                            <a href="{{ route('group.join', ['code' => $data->code]) }}" wire:navigate>
                                @livewire('group.item', ['group' => $data], key($data->id))
                            </a>
                        @empty
                            <p class="text-lg opacity-75 text-center py-6">kode {{ $cari }} tidak ditemukan</p>
                        @endforelse
                    </div>
                @endisset
            </div>
        </div>
        <label class="modal-backdrop" wire:click="$set('show', 0)">Close</label>
    </div>
</div>
