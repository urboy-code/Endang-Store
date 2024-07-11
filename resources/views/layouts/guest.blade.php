<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-hitamCoklat">
    <div class="min-h-screen flex flex-col justify-center px-8 items-center pt-6 sm:pt-0">
        <div class="flex justify-center items-center flex-col">
            <a href="/">
                <img src="{{ asset('assets/icon/dashboard_icon.png') }}" alt="icon" class="w-28 h-auto">
            </a>
            <h4 class="font-extrabold text-white text-2xl ">Welcome To Endang Store 🥰</h4>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
