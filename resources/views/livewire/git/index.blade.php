<div class="space-y-6">
    <div>
        <button class="btn btn-primary" wire:click="gitExec('stash')">
            <x-tabler-database class="w-5 h-5" />
            <span>Git stash</span>
        </button>
        <button class="btn btn-primary" wire:click="gitExec('pull')">
            <x-tabler-database class="w-5 h-5" />
            <span>Git pull</span>
        </button>
        <button class="btn btn-primary" wire:click="gitExec('status', 0)">
            <x-tabler-database class="w-5 h-5" />
            <span>Git status</span>
        </button>
    </div>

    <div>
        <pre class="font-mono">{{ $output }}</pre>
    </div>
</div>
