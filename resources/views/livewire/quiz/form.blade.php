<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form wire:submit="simpan" class="modal-box">
            <h3 class="font-bold text-lg">Buat pertanyaan quiz baru</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Pertanyaan</span>
                    </label>
                    <textarea class="textarea textarea-bordered" placeholder="tuliskan pertanyaan disini" wire:model="form.question"></textarea>
                </div>

                <div class="flex gap-4 w-full">
                    <div class="flex-1">
                        <div class="form-control w-full">
                            <label for="" class="label">
                                <span class="label-text">Media</span>
                            </label>
                            <input type="file" class="file-input w-full" wire:model="media" accept="image/*">
                        </div>
                    </div>
                    <div class="flex-none">
                        <div class="avatar">
                            <div class="w-24 rounded-lg">
                                <img src="{{ $media ? $media->temporaryUrl() : url('nocontent.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                @foreach (['a', 'b', 'c', 'd'] as $abjad)
                    <div class="join">
                        <label class="btn btn-ghost join-item">
                            <input type="radio" class="radio" wire:model="form.answer" value="{{ $abjad }}">
                        </label>
                        <input type="text" class="join-item input input-bordered"
                            placeholder="Pilihan {{ $abjad }}" wire:model="form.{{ $abjad }}">
                    </div>
                @endforeach

            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
