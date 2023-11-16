<div class="space-y-6">
    <div>
        <button class="btn btn-primary" wire:click="stash">
            <x-tabler-database class="w-5 h-5" />
            <span>Git stash</span>
        </button>
        <button class="btn btn-primary" wire:click="pull">
            <x-tabler-database class="w-5 h-5" />
            <span>Git pull</span>
        </button>
    </div>

    @if ($output)
        <pre>{{ $output }}</pre>
    @endif
</div>
