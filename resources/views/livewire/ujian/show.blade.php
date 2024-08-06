<div class="page-wrapper space-y-10">

    <div class="flex justify-between gap-4">
        <div>
            <a href="{{ route('ujian.index') }}" class="btn">
                <x-tabler-chevron-left class="size-5" />
                <span>Kembali</span>
            </a>
        </div>
        <div>
            <button class="btn btn-square" wire:click="dispatch('reload')">
                <x-tabler-reload class="size-5" />
            </button>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <div class="flex flex-col">
            <h3 class="card-title">{{ $ujian->title }}</h3>
            <small class="opacity-50">{{ $ujian->group->name }}</small>
        </div>
        {{-- <article class="prose">{!! Str::markdown($ujian->description) !!}</article> --}}
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div class="col-span-full">
            <h3 class="card-title">Statistik ujian</h3>
        </div>
        <div class="card bg-base-200">
            <div class="card-body justify-between">
                <ul class="list list-disc list-inside text-sm">
                    <li>{{ $ujian->exams->where('selesai', false)->count() }} sedang ujian</li>
                    <li>{{ $ujian->exams->where('selesai', true)->count() }} sudah selesai</li>
                    <li>Total peserta ujian {{ $ujian->exams->count() }}</li>
                </ul>

                <input type="range" min="0" max="{{ $ujian->exams->count() }}"
                    value="{{ $ujian->exams->where('selesai', true)->count() }}" step="1"
                    class="range range-xs range-primary" @disabled(true) />
            </div>
        </div>
        <div @class([
            'card',
            'text-base-content bg-base-200' => !$ujian->start,
            'text-primary-content bg-gradient-to-tr from-primary to-accent' =>
                $ujian->start,
        ])>
            <div class="card-body justify-between space-y-6">
                <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($ujian->start)
                    wire:change="dispatch('toggleStart', [{{ $ujian->id }}])" />

                <div class="flex flex-col">
                    <h4>{{ $ujian->status_label['label'] }}</h4>
                    <small class="opacity-50">{{ $ujian->status_label['desc'] }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <h3 class="card-title">Aktifitas peserta</h3>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Peserta</th>
                    <th>Progress</th>
                    <th class="text-center">Dikerjakan</th>
                    <th class="text-center">Status</th>
                </thead>
                <tbody>
                    @foreach ($ujian->exams as $exam)
                        @php
                            $user = $exam->user;
                            $totalQuis = $ujian->quizzes->count();
                            $count = count($exam->data['jawaban']);
                            $nilai = $exam->data['nilai'];
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap">
                                <div class="flex gap-3 items-center text-left">
                                    <div class="avatar">
                                        <div class="w-8 rounded aspect-video">
                                            <img src="{{ $user->image_url }}" />
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold">{{ Str::limit($user->name, 40) }}</span>
                                        <span class="text-xs opacity-50">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="range" min="0" max="{{ $totalQuis }}"
                                    value="{{ $count }}" step="1" class="range range-primary range-xs"
                                    @disabled(true) />
                            </td>
                            <th class="text-center font-mono">{{ $count }}/{{ $totalQuis }}</td>
                            <td>
                                @if ($exam->selesai)
                                    Selesai
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('ujian.actions')
</div>
