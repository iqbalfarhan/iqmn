<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box space-y-4 max-w-sm">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Pilih tema</h3>
                <button wire:click="closeModal" class="btn btn-circle btn-ghost">
                    <x-tabler-x />
                </button>
            </div>
            <div class="grid grid-cols-1 gap-3">
                @foreach ($themeList as $theme)
                    <button class="btn btn-block justify-between rounded" data-theme="{{ $theme }}"
                        wire:click="ubahTema('{{ $theme }}')">
                        {{ Str::ucfirst($theme) }}
                        <div class="flex">
                            <div class="size-3 rounded-full bg-primary"></div>
                            <div class="size-3 rounded-full bg-secondary"></div>
                            <div class="size-3 rounded-full bg-neutral"></div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
