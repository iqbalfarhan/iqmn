<div>

    {{-- <pre>@json($datas->pluck('label')->unique()->values(), JSON_PRETTY_PRINT)</pre> --}}
    {{-- <pre>@json(
        $datas->load('user')->groupBy('label')->map(function ($nilai) {
                return $nilai->groupBy('user.name');
            }),
        JSON_PRETTY_PRINT)</pre> --}}
    <table class="table">
        <thead>
            <th>No</th>
            <th>Nama</th>
            @foreach (['tugas', 'quiz', 'uts', 'uas'] as $label)
                <th class="capitalize text-center">{{ $label }}</th>
            @endforeach
        </thead>
        <tbody>
            {{-- @foreach ($datas->load('user')->groupBy('user.name') ?? [] as $name => $nilai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $name }}</td>
                    @foreach (['tugas', 'quiz', 'uts', 'uas'] as $label)
                        <td class="text-center">
                            @if ($set = $nilai->where('label', $label)->first())
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('editNilai', {nilai: {{ $set->id }}})">
                                    {{ $nilai->where('label', $label)->first()?->value }}
                                </button>
                            @else
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('createNilai', {label: '{{ $label }}', group_id: {{ $group->id }}, name: '{{ $name }}'})">
                                    &nbsp;
                                </button>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach --}}

            @foreach ($users as $id => $name)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $name }}</td>
                    @foreach (['tugas', 'quiz', 'uts', 'uas'] as $label)
                        @php
                            $nilai = $datas->where('label', $label)->where('user_id', $id)->first();
                        @endphp

                        @can('nilai.edit')
                            <td class="text-center">
                                @isset($nilai)
                                    <button class="btn btn-xs btn-square"
                                        wire:click="$dispatch('editNilai', {nilai: {{ $nilai->id }}})">
                                        {{ $nilai->value }}
                                    </button>
                                @else
                                    <button class="btn btn-xs btn-square"
                                        wire:click="$dispatch('createNilai', {label: '{{ $label }}', group_id: {{ $group->id }}, user_id: {{ $id }}})">
                                        &nbsp;
                                    </button>
                                @endisset
                            </td>
                        @else
                            <td class="text-center">{{ $nilai?->value ?? '-' }}</td>
                        @endcan
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    @livewire('group.nilai.actions', ['group' => $group])
</div>
