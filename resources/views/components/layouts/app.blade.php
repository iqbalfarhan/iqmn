<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
    
    @livewireStyles
</head>
<body>
    
    @auth
    <div class="drawer lg:drawer-open min-h-screen">
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
    <div class="bg-base-200 min-h-screen flex justify-center items-center">
        {{ $slot }}
    </div>
    @endguest
    
    @livewireScripts
</body>
</html>
