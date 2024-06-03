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
        <div class="hero min-h-screen bg-base-100">
            <div class="hero-content text-center">
                <div class="max-w-md space-y-8">
                    <h1 class="text-5xl font-extrabold">Kamu lagi Offline</h1>
                    <p>Coba cek lagi koneksi internet kamu, mungkin ada beberapa kendala sehingga kamu
                        tidak bisa mengakses</p>
                    <h1 class="text-3xl font-black text-primary">.IQMN</h1>
                </div>
            </div>
        </div>
    </body>

</html>
