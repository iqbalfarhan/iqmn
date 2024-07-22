<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form wire:submit="submit" class="modal-box">
            <h3 class="text-lg font-bold">Ujian actions</h3>
            <div class="py-4 space-y-2">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Kelas</span>
                    </label>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.group_id'),
                    ]) wire:model="form.group_id">
                        <option value="">Pilih kelas</option>
                        @foreach ($kelas_ids as $kelas_id => $kelas_name)
                            <option value="{{ $kelas_id }}">{{ $kelas_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama ujian</span>
                    </label>
                    <input @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.title'),
                    ]) wire:model="form.title" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Keterangan Ujian</span>
                    </label>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.description'),
                    ]) wire:model="form.description"></textarea>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
