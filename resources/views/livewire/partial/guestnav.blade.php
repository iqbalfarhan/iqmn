<div class="navbar border-b-2 border-base-300">
    <div class="flex-1">
        <a href="{{ route('welcome') }}" class="btn btn-ghost text-2xl font-black text-primary" wire:navigate>
            {{ config('app.name') }}
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal">
            @auth
                <li><a href="{{ route('home') }}" wire:navigate>Home</a></li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-tabler-book class="size-4" />
                        <span>Artikel</span>
                    </a>
                </li>
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}" class="gap-1" wire:navigate>
                            <x-tabler-login class="size-4" />
                            <span>Login</span>
                        </a>
                    </li>
                @endif
            @endguest
        </ul>
    </div>
</div>
