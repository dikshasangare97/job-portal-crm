<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CMS</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @livewireStyles

</head>

<body >
    <livewire:component.layouts.header />

    @if (Route::has('login'))
    @auth
    @if(Auth::user()->is_user == 2)
    @can('user')
    <div class="min-h-screen p-5 bg-gray-100">
        @yield('content')
        @isset($slot)
        {{$slot}}
        @endisset
    </div>
    @else
    <!-- admin -->
    <div class="min-h-screen w-full bg-gray-50 !pl-0 sm:!pl-60" id="content">
        <div class="mx-5 mt-24 mb-10">
            @yield('content')
            @isset($slot)
            {{$slot}}
            @endisset
        </div>
    </div>
    @endcan

    @else
    <div class="min-h-screen p-5 bg-gray-100">
        @yield('content')
        @isset($slot)
        {{$slot}}
        @endisset
    </div>
    @endif
    @else
    <div class="min-h-screen p-5 bg-gray-100">
        @yield('content')
        @isset($slot)
        {{$slot}}
        @endisset
    </div>
    @endauth
    @else
    <div class="min-h-screen p-5 bg-gray-100">
        @yield('content')
        @isset($slot)
        {{$slot}}
        @endisset
    </div>
    @endif

    <livewire:component.layouts.footer />
    @livewireScripts

    @stack('scripts')
</body>

</html>