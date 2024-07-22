<div class="page-wrapper space-y-10">
    <a href="{{ route('ujian.index') }}" class="btn">
        <x-tabler-chevron-left class="size-5" />
        <span>Kembali</span>
    </a>

    <div class="flex flex-col gap-4">
        <div class="flex flex-col">
            <h3 class="card-title">{{ $ujian->title }}</h3>
            <small class="opacity-50">{{ $ujian->group->name }}</small>
        </div>
        <p>{{ $ujian->description }}</p>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div class="col-span-full">
            <h3 class="card-title">Statistik ujian</h3>
        </div>
        <div class="card bg-base-200">
            <div class="card-body justify-between">
                <ul class="list list-disc list-inside text-sm">
                    <li>4 sedang ujian</li>
                    <li>4 sudah selesai</li>
                    <li>Total peserta ujian {{ $ujian->group->users->count() }}</li>
                </ul>

                <input type="range" min="0" max="{{ $ujian->group->users->count() }}" value="1"
                    step="1" class="range range-primary" @disabled(true) />
            </div>
        </div>
        <div @class([
            'card',
            'text-base-content bg-base-200' => !$ujian->start,
            'text-primary-content bg-gradient-to-tr from-primary to-accent' =>
                $ujian->start,
        ])>
            <div class="card-body justify-between space-y-6">
                <input type="checkbox" class="toggle toggle-primary" @checked($ujian->start)
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
                    <th class="text-center">Status</th>
                </thead>
                <tbody>
                    @foreach ($ujian->exams as $exam)
                        @php
                            $user = $exam->user;
                            $totalQuis = $ujian->quizzes->count();
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
                                    value="{{ fake()->numberBetween(0, 40) }}" step="1"
                                    class="range range-primary range-xs" @disabled(true) />
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('ujian.actions')
</div>
