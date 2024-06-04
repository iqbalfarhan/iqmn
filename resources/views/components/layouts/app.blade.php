<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'dark') }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ config('app.name') }} ::. {{ $title ?? 'Iqbal material ngajar' }}</title>

        @if (session('theme', 'dark') == 'dark')
            <link rel="icon" href="{{ url('darkicon.png') }}">
        @else
            <link rel="icon" href="{{ url('lighticon.png') }}">
        @endif

        @vite('resources/css/app.css')

        @livewireStyles
        @laravelPWA
    </head>

    <body>

        @auth
            <div class="drawer {{ session('sidebar', 'lg:drawer-open') }} min-h-screen">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                    {{ $slot }}
                    @livewire('partial.footer')
                    @livewire('partial.bottomnav')
                </div>
                <div class="drawer-side scrollbar-hide">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth


        @guest
            @if (Route::is(['login', 'register']))
                <div class="bg-base-100 min-h-screen flex justify-center items-center">
                    {{ $slot }}
                </div>
            @else
                <div class="flex flex-col h-screen">
                    <div class="flex-none">
                        @livewire('partial.guestnav')
                    </div>
                    <div class="flex-1 overflow-y-scroll scrollbar-hide">
                        {{ $slot }}
                    </div>
                </div>
            @endif
        @endguest

        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
