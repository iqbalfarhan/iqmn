<div class="navbar bg-base-200/30 rounded-xl shadow-xl">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-ghost btn-circle">
            <x-tabler-menu class="w-5 h-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost normal-case font-black text-primary text-2xl lg:hidden" href="{{ route('home') }}"
            wire:navigate>{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        <a href="{{ route('profile') }}" class="btn btn-ghost" wire:navigate>
            <div class="flex-col items-end hidden lg:flex normal-case">
                <span class="font-semibold text-sm">{{ $user->name }}</span>
                <span class="text-xs opacity-70">{{ $user->getRoleNames()->first() }}</span>
            </div>
            <div class="avatar">
                <div class="w-8 rounded-full bg-neutral-focus text-neutral-content">
                    <img src="{{ $user->image_url }}" alt="">
                </div>
            </div>
        </a>
    </div>
</div>
