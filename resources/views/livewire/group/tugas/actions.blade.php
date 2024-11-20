<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">Form tugas {{ $group?->name }}</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">Judul tugas</label>
                    <input type="text" class="input input-bordered" placeholder="judul tugas"
                        wire:model="form.title" />
                </div>
                <div class="form-control">
                    <label for="" class="label">Attachment tugas</label>
                    <input type="file" class="file-input" wire:model="photo" />
                </div>
                <div class="form-control">
                    <label for="" class="label">Keterangan tugas</label>
                    <textarea class="textarea textarea-bordered" placeholder="keterangan tugas" wire:model="form.body"></textarea>
                </div>
                <div class="form-control">
                    <label for="" class="label">Batas pengumpulan</label>
                    <input type="date" class="input" wire:model="form.duedate" />
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
