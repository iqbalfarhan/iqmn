<form class="page-wrapper" wire:submit="simpan">
    <div class="flex flex-col md:flex-row gap-6">
        <div class="flex-1">
            <div class="card bg-base-200">
                <div class="card-body">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Judul article</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered"
                            wire:model.live="form.title" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Tulisan</span>
                        </div>
                        <textarea type="text" rows="15" placeholder="Type here" class="textarea textarea-bordered scrollbar-hide"
                            wire:model="form.body"></textarea>
                    </label>
                </div>
            </div>
        </div>
        <div class="flex-none">
            <div class="w-96">
                <div class="card-title">Thumbnail</div>
                <img src="{{ $photo ? $photo->temporaryUrl() : $post->image_url }}" class="rounded-xl w-full"
                    onclick="document.getElementById('pickphoto').click()">
                <input type="file" wire:model="photo" class="hidden" id="pickphoto">
            </div>
        </div>
    </div>

    <button class="btn btn-primary">
        <x-tabler-check class="size-5" />
        <span>Simpan</span>
    </button>
</form>
