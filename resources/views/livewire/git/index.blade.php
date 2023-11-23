<div class="space-y-6">
    <div class="flex gap-2">
        <button class="btn btn-primary" wire:click="gitExec('stash')">
            <x-tabler-database class="w-5 h-5" />
            <span>Git stash</span>
        </button>
        <button class="btn btn-primary" wire:click="gitExec('pull')">
            <x-tabler-git-merge class="w-5 h-5" />
            <span>Git pull</span>
        </button>
        <button class="btn btn-primary" wire:click="gitExec('status')">
            <x-tabler-database class="w-5 h-5" />
            <span>Git status</span>
        </button>
        <span wire:loading>
            <div class="btn btn-ghost">
                <div class="loading loading-xs"></div>
            </div>
        </span>
    </div>

    <div>
        <pre class="font-mono">{{ $output }}</pre>
    </div>
</div>
