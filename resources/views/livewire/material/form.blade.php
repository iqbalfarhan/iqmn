<div class="page-wrapper">
    <div class="flex justify-center">
        <div role="tablist" class="tabs tabs-boxed w-fit">
            @foreach ($tabs as $tab)
                <button wire:click="$set('active_tab', '{{ $tab }}')" role="tab"
                    @class(['tab capitalize', 'tab-active' => $active_tab == $tab])>{{ $tab }}</button>
            @endforeach
        </div>
    </div>

    @if ($active_tab == 'keterangan')
        <form class="space-y-8" wire:submit="simpan">
            <div class="space-y-2 md:space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text text-lg">Judul material</span>
                        @error('title')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('title') input-error @enderror"
                        wire:model.live="title" placeholder="Tuliskan judul materi yang akan anda upload" />
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text text-lg">URL file</span>
                            @error('url')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="url" class="input input-bordered @error('url') input-error @enderror"
                            wire:model.live="url" placeholder="Link dari google docs pastikan sudah di share" />
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text text-lg">Material Group</span>
                            @error('group_id')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="select select-bordered @error('group_id') select-error @enderror"
                            wire:model.live="group_id">
                            <option value="">Pilih group untuk material ini</option>
                            @foreach ($groups as $groupid => $groupname)
                                <option value="{{ $groupid }}">{{ $groupname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text text-lg">Thumbnail</span>
                            @error('thumbnail')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="file"
                            class="file-input file-input-bordered @error('thumbnail') file-input-error @enderror"
                            wire:model.live="thumbnail" />

                        @if ($thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl() }}" alt="" class="pt-2 rounded-lg w-full">
                        @endif
                    </div>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text text-lg">Deskripsi material</span>
                        @error('description')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <textarea type="text" rows="15"
                        class="textarea textarea-bordered @error('description') textarea-error @enderror" wire:model.live="description"
                        placeholder="Tuliskan keterangan tentang materi ini. harap gunakan format markdown dalam penulisan"></textarea>
                </div>

                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text text-lg">Tags material</span>
                        @error('tags')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('tags') input-error @enderror"
                        wire:model.live="tags" placeholder="tulis tag dan pisahkan dengan comma" />
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    @elseif ($active_tab == 'quizzes')
        @if ($material && $material->quizzes)
            @livewire('quiz.form', ['material_id' => $material->id])
            <div class="flex justify-between items-center">
                <span>{{ $quizzes->count() }} Pertanyaan</span>
                <label for="addQuiz" class="btn btn-primary">
                    <x-tabler-circle-plus class="w-5 h-5" />
                    <span>Tambah</span>
                </label>
            </div>
            <div class="flex flex-col gap-2">

                @forelse ($quizzes as $quiz)
                    <div class="card bg-base-200 group" wire:key='{{ $quiz->id }}'>
                        <div class="card-body space-y-4">
                            <div class="flex justify-between gap-4">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold">
                                        {{ $quiz->question }}
                                    </h3>
                                </div>
                                <div class="flex opacity-0 group-hover:opacity-100 space-x-1">
                                    <button wire:click="edit({{ $quiz->id }})"
                                        class="btn btn-sm btn-square btn-ghost">
                                        <x-tabler-edit class="w-5 h-5" />
                                    </button>
                                    <button wire:click="edit({{ $quiz->id }})"
                                        class="btn btn-sm btn-square btn-ghost">
                                        <x-tabler-trash class="w-5 h-5" />
                                    </button>
                                </div>
                            </div>

                            <div class="flex flex-col gap-1">
                                @foreach ($quiz->option_lists as $point => $list)
                                    <span @class(['', 'text-primary' => $point == $quiz->answer])>{{ $point }}. {{ $list }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    @livewire('partial.nocontent')
                @endforelse

            </div>
        @endif
    @endif
</div>
