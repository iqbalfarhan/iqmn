<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-xl">
            <h3 class="font-bold text-lg">Gabung dengan group</h3>
            <div class="w-full py-6 mx-auto space-y-4">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Cari nama group</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered w-full',
                        'input-error' => $errors->first('cari'),
                    ]) placeholder="Cari dengan judul"
                        wire:model.lazy="cari">
                </label>
            </div>
            @if ($cari)
                <div class="grid gap-2">
                    @foreach ($datas as $data)
                        @livewire('group.item', ['group' => $data], key($data->id))
                    @endforeach
                </div>
            @endif
            <div class="modal-action">
                <button class="btn" wire:click="$set('show', 0)">Close!</button>
            </div>
        </div>
    </div>
</div>
