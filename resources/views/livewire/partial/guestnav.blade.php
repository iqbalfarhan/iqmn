<div class="navbar border-b-2 border-base-300">
    <div class="flex-1 md:flex-none">
        <a href="{{ route('welcome') }}" class="btn btn-ghost text-2xl font-black text-primary" wire:navigate>
            {{ config('app.name') }}
        </a>
    </div>
    <div class="hidden md:flex flex-1">
        <ul class="menu menu-horizontal">
            <li>
                <a href="" class="gap-1">
                    <x-tabler-dashboard class="size-4" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('article.index') }}" wire:navigate class="gap-1">
                    <x-tabler-book class="size-4" />
                    <span>Artikel</span>
                </a>
            </li>
            <li>
                <a href="" class="gap-1">
                    <x-tabler-paper-bag class="size-4" />
                    <span>Portfolio</span>
                </a>
            </li>
            <li>
                <a href="" class="gap-1">
                    <x-tabler-message class="size-4" />
                    <span>Testimoni</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal">
            <li class="md:hidden">
                <a href="{{ route('article.index') }}" wire:navigate class="gap-1">
                    <x-tabler-book class="size-4" />
                    <span>Artikel</span>
                </a>
            </li>
            @auth
                <li><a href="{{ route('home') }}" wire:navigate>Home</a></li>
            @endauth
            @guest
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
