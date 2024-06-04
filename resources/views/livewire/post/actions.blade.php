<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Judul article yang ingin dibuat</h3>
            <div class="py-4">
                <label class="form-control">
                    <input type="text" placeholder="Judul post" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.title'),
                    ])
                        wire:model.live="form.title" />
                    <div class="label">
                        <span class="label-text-alt">{{ Str::slug($form->title) }}</span>
                    </div>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close!</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Buat postingan</span>
                </button>
            </div>
        </form>
    </div>
</div>
