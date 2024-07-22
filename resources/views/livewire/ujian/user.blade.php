<div class="page-wrapper">
    @if ($exam && $exam->selesai == false)
        <div class="flex justify-between items-center ">
            <div class="btn btn-ghost normal-case">
                {{ count($jawaban) }}/{{ count($answers) }} soal telah diisi.
            </div>

            <button class="btn" wire:click="toggleShowDescription">Keterangan ujian</button>
        </div>
        <div class="card card-divider bg-base-200/50">
            <div class="card-body">
                <div class="space-y-8">

                    @if ($showDescription)
                        <article class="prose">{!! Str::markdown($ujian->description) !!}</article>
                    @endif

                    @foreach ($ujian->quizzes as $data)
                        <div class="card card-compact" wire:key="{{ $data->id }}">
                            <div class="card-body">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <div>
                                        <div class="tooltip" data-tip="reset jawaban">
                                            <button wire:click="unsetJawaban({{ $data->id }})"
                                                class="text-lg btn btn-circle btn-primary disabled {{ isset($jawaban[$data->id]) ? '' : 'btn-outline' }}">
                                                {{ $no++ }}.</button>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-4">
                                        @if ($data->media)
                                            <figure>
                                                <img src="{{ $data->media_url }}" alt=""
                                                    class="rounded-lg w-full max-w-80">
                                            </figure>
                                        @endif
                                        <div class="text-xl font-semibold">{{ $data->question }}</div>
                                        <div class="flex flex-col gap-2">
                                            <div class="form-control">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" class="radio radio-primary"
                                                        name="{{ $data->id }}" value="a"
                                                        wire:model.live="jawaban.{{ $data->id }}" />
                                                    <span class="label-text">{{ $data->a }}</span>
                                                </label>
                                            </div>
                                            <div class="form-control">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" class="radio radio-primary"
                                                        name="{{ $data->id }}" value="b"
                                                        wire:model.live="jawaban.{{ $data->id }}" />
                                                    <span class="label-text">{{ $data->b }}</span>
                                                </label>
                                            </div>
                                            <div class="form-control">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" class="radio radio-primary"
                                                        name="{{ $data->id }}" value="c"
                                                        wire:model.live="jawaban.{{ $data->id }}" />
                                                    <span class="label-text">{{ $data->c }}</span>
                                                </label>
                                            </div>
                                            <div class="form-control">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" class="radio radio-primary"
                                                        name="{{ $data->id }}" value="d"
                                                        wire:model.live="jawaban.{{ $data->id }}" />
                                                    <span class="label-text">{{ $data->d }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider md:hidden"></div>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="card-actions justify-between">
                    <button wire:click="simpan" class="btn btn-primary">
                        <x-tabler-device-floppy class="size-5" />
                        <span>Simpan</span>
                    </button>
                    <button wire:click="selesai" class="btn btn-info">
                        <x-tabler-check class="size-5" />
                        <span>Selesai</span>
                    </button>
                </div>
            </div>
        </div>
    @elseif ($exam && $exam->selesai == true)
        <a href="{{ route('group.show', $ujian->group) }}" class="btn">
            <x-tabler-chevron-left class="size-5" />
            <span>Kembali</span>
        </a>
        <div class="card bg-base-200 card-divider max-w-lg mx-auto">
            <div class="card-body">
                <div class="space-y-6">
                    <div class="div">
                        <h1 class="card-title">{{ $ujian->title }}</h1>
                        <small class="opacity-50">{{ $ujian->group->name }}</small>
                    </div>

                    <div role="alert" class="alert alert-warning">
                        <x-tabler-exclamation-circle class="size-6" />
                        <span>Kamu telah menyelesaikan ujian ini pada : {{ $exam->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card bg-base-200 card-divider max-w-lg mx-auto">
            <div class="card-body">
                <div class="space-y-10">
                    <div class="div">
                        <h1 class="card-title">{{ $ujian->title }}</h1>
                        <small class="opacity-50">{{ $ujian->group->name }}</small>
                    </div>

                    <article class="prose">{!! Str::markdown($ujian->description) !!}</article>
                </div>
            </div>
            <div class="card-body py-5">
                <div class="card-actions">
                    <button class="btn btn-primary" wire:click='joinUjian'>
                        <span>Mulai ujian</span>
                        <x-tabler-chevron-right class="size-5" />
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
