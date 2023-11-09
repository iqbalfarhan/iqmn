<div class="card shadow-lg w-full max-w-2xl mx-auto">
    <form class="card-body space-y-6" wire:submit="simpan">
        <div class="space-y-4">
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Judul material</span>
                    @error('title')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </label>
                <input type="text" class="input input-bordered @error('title') input-error @enderror"
                    wire:model.live="title" />
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">URL file</span>
                        @error('url')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="url" class="input input-bordered @error('url') input-error @enderror"
                        wire:model.live="url" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Thumbnail</span>
                        @error('thumbnail')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="file"
                        class="file-input file-input-bordered @error('thumbnail') file-input-error @enderror"
                        wire:model.live="thumbnail" />
                </div>
            </div>
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Deskripsi material</span>
                    @error('description')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </label>
                <textarea type="text" rows="6"
                    class="textarea textarea-bordered @error('description') textarea-error @enderror" wire:model.live="description"></textarea>
            </div>

            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">tags</span>
                    @error('tags')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </label>
                <input type="text" class="input input-bordered @error('tags') input-error @enderror"
                    wire:model.live="tags" />
            </div>
        </div>

        <div class="card-actions">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
