<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'cupcake') }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }} ::. {{ $title ?? 'Iqbal material ngajar' }}</title>
        <link rel="icon" href="{{ url('lighticon.png') }}">
        @vite('resources/css/app.css')
        @livewireStyles
        @laravelPWA
    </head>

    <body>

        @auth
            <div class="drawer {{ session('sidebar', 'lg:drawer-open') }} min-h-screen">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <div class="flex flex-col h-screen">
                        @livewire('partial.navbar')
                        <div class="flex-1 overflow-y-scroll scrollbar-hide pb-16">
                            {{ $slot }}
                            @livewire('partial.bottomnav')
                        </div>
                    </div>
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
                    <div class="flex flex-1 h-screen">
                        <div
                            class="hidden lg:flex flex-1 bg-base-200/40 items-center justify-center flex-col border-r-4 border-dashed border-base-300">
                            <div class="w-96 space-y-10">
                                <a href="{{ route('welcome') }}" class="btn btn-primary btn-outline" wire:navigate>
                                    <x-tabler-chevron-left class="size-5" />
                                    <span>Kembali</span>
                                </a>
                                <h3 class="text-4xl font-extrabold">Selamat datang</h3>
                                @livewire('partial.illustration')
                                <p>Silakan login atau dengan akun google atau github dengan cara klik pada metode login
                                    dengan github.</p>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center justify-center bg-base-100 bg-radial-primary">
                            {{ $slot }}
                        </div>
                    </div>
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
