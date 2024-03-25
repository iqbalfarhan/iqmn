<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Edit datauser</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <div class="label-text">Nama user</div>
                    </div>
                    <input type="text" class="input input-bordered" wire:model="form.name">
                </label>
                <label class="form-control">
                    <div class="label">
                        <div class="label-text">Alamat email</div>
                    </div>
                    <input type="text" class="input input-bordered" wire:model="form.email">
                </label>
                <label class="form-control">
                    <div class="label">
                        <div class="label-text">Role user</div>
                    </div>
                    <select type="text" class="select select-bordered" wire:model="form.role">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="resetUser">Close!</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
