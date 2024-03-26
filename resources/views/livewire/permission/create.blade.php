<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent="simpan">
            <h3 class="font-bold text-lg">Tambah {{ $model }}</h3>
            <div class="py-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">{{ $model }} name</span>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered" wire:model="name" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="resetForm" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
</div>
