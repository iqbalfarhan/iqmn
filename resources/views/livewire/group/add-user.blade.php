<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Pilih user untuk ditambahkan ke group</h3>
            <div class="py-4">
                @foreach ($users as $id => $name)
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" value="{{ $id }}" class="checkbox checkbox-primary"
                                wire:model="user_ids" />
                            <span class="label-text">{{ $name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn">Simpan</button>
            </div>
        </form>
    </div>
</div>
