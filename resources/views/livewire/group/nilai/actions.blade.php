<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">Form nilai {{ $group?->name }}</h3>
            <div class="py-4 space-y-4">
                {{-- <div class="form-control">
                    <label for="" class="label">Label nilai</label>
                    <input type="text" class="input input-bordered" placeholder="judul tugas"
                        wire:model="form.label" />
                </div>
                <div class="form-control">
                    <label for="" class="label">Group kelas</label>
                    <input type="text" class="input input-bordered" placeholder="judul tugas"
                        wire:model="form.group_id" />
                </div>
                <div class="form-control">
                    <label for="" class="label">Nama user</label>
                    <select class="select" wire:model="form.user_id">
                        @foreach ($users as $user_id => $user_name)
                            <option value="{{ $user_id }}" @selected($user_id == $form->user_id)>{{ $user_name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-control">
                    <label for="" class="label">Nilai</label>
                    <input type="number" placeholder="nilai" class="input" wire:model="form.value" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button wire:click="closeModal" class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
