<div class="navbar bg-transparent top-0 absolute w-full left-0 print:hidden">
    <div class="flex-1">
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
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
