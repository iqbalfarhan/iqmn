<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Add new group</h3>
            <div class="py-4">
                <div class="flex justify-center items-center">
                    <label class="avatar">
                        <div class="w-24 rounded-full">
                            <img src="{{ $photo ? $photo->temporaryUrl() : url('nouser.png') }}" alt="">
                        </div>
                        <input type="file" class="hidden" wire:model.live="photo" id="pickPhoto" />
                    </label>
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Kode group</span>
                        <span class="label-text-alt" wire:click="regenerateCode">regenerate</span>
                    </div>
                    <input type="text"
                        class="font-mono input input-bordered @error('form.code') input-error @enderror"
                        wire:model="form.code" placeholder="Kode Group" />
                    @error('form.code')
                        <label for="" class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama group</span>
                        @error('form.name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.name') input-error @enderror"
                        wire:model="form.name" placeholder="Nama Group" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Keterangan group</span>
                        @error('form.desc')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.desc'),
                    ]) wire:model="form.desc" placeholder="Nama Group"></textarea>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close!</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
