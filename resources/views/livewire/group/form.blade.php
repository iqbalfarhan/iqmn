<div>
    <input type="checkbox" id="groupFormModal" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Add new group</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama group</span>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('name') input-error @enderror"
                        wire:model.live="name" placeholder="Nama Group" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="groupFormModal" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
