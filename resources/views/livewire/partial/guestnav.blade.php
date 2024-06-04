<div class="navbar border-b-2 border-base-300">
    <div class="flex-1">
        <a href="{{ route('welcome') }}" class="btn btn-ghost text-xl font-black text-primary" wire:navigate>
            {{ config('app.name') }}
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal">
            @auth
                <li><a href="{{ route('home') }}" wire:navigate>Home</a></li>
            @endauth
            @guest
                @if (Route::has('login'))
                    <li><a href="{{ route('login') }}" wire:navigate>Login</a></li>
                @endif
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" wire:navigate>Register</a></li>
                @endif
            @endguest
        </ul>
    </div>
</div>
