<div class="navbar border-b-2 border-base-300 py-4">
    <div class="flex-1 md:flex-none">
        <a href="{{ route('welcome') }}" class="btn btn-ghost text-2xl font-black text-primary" wire:navigate>
            {{ config('app.name') }}
        </a>
    </div>
    <div class="hidden md:flex flex-1">
        <ul class="menu menu-horizontal">
            <li>
                <a href="{{ route('welcome') }}" class="gap-1" wire:navigate>
                    <x-tabler-dashboard class="size-4" />
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('article.index') }}" wire:navigate class="gap-1">
                    <x-tabler-book class="size-4" />
                    <span>Artikel</span>
                </a>
            </li>
            <li>
                <a href="https://iqbalfarhan.github.io" class="gap-1">
                    <x-tabler-paper-bag class="size-4" />
                    <span>Portfolio</span>
                </a>
            </li>
            <li>
                <a href="{{ route('welcome', ['#review']) }}" class="gap-1">
                    <x-tabler-message class="size-4" />
                    <span>Testimoni</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal items-center gap-3">
            @auth
                <li><a href="{{ route('home') }}" wire:navigate>Home</a></li>
            @endauth
            @guest
                <li>
                    <button wire:click="dispatch('selectTheme')" class="btn btn-outline btn-square btn-primary">
                        <x-tabler-palette class="size-5" />
                    </button>
                </li>
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-primary gap-1" wire:navigate>
                            <x-tabler-login class="size-5" />
                            <span>Masuk {{ config('app.name') }}</span>
                        </a>
                    </li>
                @endif
            @endguest
        </ul>
    </div>

    @livewire('partial.select-theme')
</div>
