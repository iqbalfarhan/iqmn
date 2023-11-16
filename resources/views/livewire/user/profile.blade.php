<div>
    <input type="checkbox" id="editProfileModal" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <form class="modal-box max-w-sm" wire:submit.prevent="simpan">
            <div class="flex justify-between">
                <h3 class="font-bold text-lg">Edit Profile : {{ $edittype }}</h3>
                <span wire:loading><span class="loading loading-xs"></span></span>
            </div>
            <div class="py-4 space-y-4">
                @if ($edittype == 'info')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama lengkap</span>
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" placeholder="Type here"
                            class="input input-bordered @error('name') input-error @enderror" wire:model="name" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alamat email</span>
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="email" placeholder="Type here"
                            class="input input-bordered @error('email') input-error @enderror" wire:model="email" />
                    </div>
                @elseif ($edittype == 'photo')
                    <label class="form-control cursor-pointer">
                        <div class="flex flex-col items-center py-5 space-y-4">
                            <div class="avatar">
                                <div class="w-36 rounded-full hover:shadow-lg">
                                    @if ($photo)
                                        <img src="{{ $photo->temporaryUrl() }}" />
                                    @else
                                        <img src="{{ auth()->user()->image_url }}" />
                                    @endif
                                </div>
                            </div>

                            <div class="flex flex-col text-center text-xs opacity-50">
                                <span>Klik photo dan pilih avatar baru</span>
                            </div>
                        </div>
                        <div class="label">
                            @error('photo')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="file" placeholder="Type here" id="photoUpdate"
                            class="file-input file-input-bordered hidden @error('photo') file-input-error @enderror"
                            wire:model.live="photo" accept="image/*" />
                    </label>
                @elseif ($edittype == 'password')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password baru</span>
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" placeholder="Type here"
                            class="input input-bordered @error('password') input-error @enderror"
                            wire:model="password" />
                    </div>
                @endif
            </div>
            <div class="modal-action justify-between">
                <label for="editProfileModal" class="btn btn-ghost">Close</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
