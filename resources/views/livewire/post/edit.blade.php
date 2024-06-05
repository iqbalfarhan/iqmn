<div class="page-wrapper">
    <form class="space-y-6" wire:submit="simpan">
        <label class="form-control">
            <div class="label">
                <span class="label-text">Judul article</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered" wire:model.live="form.title" />
        </label>
        <div class="grid md:grid-cols-2 gap-6">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Tulisan</span>
                </div>
                <textarea type="text" placeholder="Type here"
                    class="textarea textarea-sm min-h-32 h-full textarea-bordered scrollbar-hide" wire:model.live="form.body"></textarea>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Preview</span>
                </div>
                <div class="card bg-base-300">
                    <div class="card-body">
                        <article class="prose">{!! Str::markdown($form->body) !!}</article>
                    </div>
                </div>
            </label>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Thumbnail post</span>
                </label>
                <img src="{{ $photo ? $photo->temporaryUrl() : $post->image_url }}" class="rounded-xl w-full"
                    onclick="document.getElementById('pickphoto').click()">
                <input type="file" wire:model="photo" class="hidden" id="pickphoto">
            </div>
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Media post</span>
                </label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($medias as $item)
                        <div class="avatar">
                            <div class="w-full rounded-md">
                                <img src="{{ Storage::url($item) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                    <label for="uploadmedia" class="avatar placeholder">
                        <div class="w-full rounded-md bg-base-200">
                            <x-tabler-plus />
                        </div>
                    </label>
                </div>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text">Publish post</span>
                    <input type="checkbox" class="toggle" wire:model="form.show" />
                </label>
            </div>
        </div>


        <div class="flex flex-col md:flex-row justify-between gap-2">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan perubahan</span>
            </button>
            <a href="{{ route('post.show', $post) }}" class="btn btn-info">
                <x-tabler-eye class="size-5" />
                <span>Preview post</span>
            </a>
        </div>
    </form>

    <input type="checkbox" id="uploadmedia" class="modal-toggle" />
    <div class="modal" role="dialog">
        <form wire:submit="uploadMedias" class="modal-box">
            <h3 class="font-bold text-lg">Upload media untuk post ini</h3>
            <div class="py-4">
                <input type="file" wire:model="media" multiple class="file-input file-input-bordered w-full">
            </div>
            <div class="modal-action justify-between">
                <label for="uploadmedia" class="btn">Close!</label>
                <button class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>

</div>
