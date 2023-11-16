<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'dark') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @if (session('theme', 'dark') == 'dark')
        <link rel="icon" href="{{ url('darkicon.png') }}">
    @else
        <link rel="icon" href="{{ url('lighticon.png') }}">
    @endif

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body>

    @auth
        <div class="drawer {{ session('sidebar', 'lg:drawer-open') }} min-h-screen">
            <input id="drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                @livewire('partial.navbar')
                <div class="container mx-auto max-w-5xl p-6 overflow-x-auto">
                    {{ $slot }}

                    @livewire('partial.footer')
                </div>
            </div>
            <div class="drawer-side">
                <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                @livewire('partial.sidebar')
            </div>
        </div>
    @endauth


    @guest
        <div class="bg-base-100 min-h-screen flex justify-center items-center">
            @livewire('partial.guestnav')
            {{ $slot }}
        </div>
    @endguest

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>
