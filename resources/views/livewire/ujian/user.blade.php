<div class="page-wrapper">
    @if ($exam)
        <pre>@json($exam, JSON_PRETTY_PRINT)</pre>
    @else
        <div class="card bg-base-200 card-divider">
            <div class="card-body">
                <div class="space-y-10">
                    <div class="div">
                        <h1 class="card-title">{{ $ujian->title }}</h1>
                        <small class="opacity-50">{{ $ujian->group->name }}</small>
                    </div>

                    <p></p>

                    <div class="grid grid-cols-2 gap-2">
                        <div class="col-span-full">
                            <h3 class="card-title">Peserta</h3>
                        </div>
                        <div class="border rounded-xl border-base-300">
                            @livewire('user.item', ['user' => auth()->user()])
                        </div>
                    </div>
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
