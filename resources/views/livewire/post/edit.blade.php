<div class="page-wrapper">
    <form class="flex flex-col gap-6" wire:submit="simpan">
        <div class="flex flex-row gap-6">
            <div class="w-8/12 space-y-6">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-lg">Judul article</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered"
                        wire:model.live="form.title" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-lg">Tulisan</span>
                    </div>
                    <textarea type="text" rows="15" placeholder="Type here"
                        class="textarea min-h-fit textarea-bordered scrollbar-hide" wire:model.live="form.body"></textarea>
                </label>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text text-lg">Tag post</span>
                        @error('tags')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('tags') input-error @enderror"
                        wire:model.live="tags" placeholder="tulis tag dan pisahkan dengan comma" />
                </div>
            </div>

            <div class="flex flex-col gap-6 flex-1">
                <div class="card card-compact bg-base-200">
                    <div class="card-body">
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text text-lg">Thumbnail post</span>
                            </label>
                            <img src="{{ $photo ? $photo->temporaryUrl() : $post->image_url }}"
                                class="rounded-xl w-full" onclick="document.getElementById('pickphoto').click()">
                            <input type="file" wire:model="photo" class="hidden" id="pickphoto">
                        </div>
                    </div>
                </div>

                <div class="card card-compact bg-base-200">
                    <div class="card-body">
                        <h3 class="card-title">Media post</h3>
                        <div class="form-control">
                            <div class="grid grid-cols-4 gap-1">
                                @foreach ($medias as $item)
                                    <div class="avatar">
                                        <div class="w-full rounded-md">
                                            <img src="{{ Storage::url($item) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                                <label for="uploadmedia" class="avatar placeholder">
                                    <div class="w-full rounded-md bg-base-300">
                                        <x-tabler-plus />
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-compact bg-base-200">
                    <div class="card-body">
                        <div class="card-title">Publish</div>
                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-3">
                                <input type="checkbox" class="toggle toggle-sm toggle-primary"
                                    wire:model.live="form.show" />
                                <span class="label-text">{{ $form->show ? 'Published' : 'Unpublish' }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col md:flex-row justify-between gap-2">
            <button class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan perubahan</span>
            </button>
            <button type="button" wire:click="$dispatch('previewPost', {post: {{ $post->id }}})"
                class="btn btn-info">
                <x-tabler-eye class="size-5" />
                <span>Preview post</span>
            </button>
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

    @livewire('post.preview')

</div>
