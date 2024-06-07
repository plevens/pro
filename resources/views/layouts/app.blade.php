<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <link rel="stylesheet" href="{{asset('boot/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('boot/css-ui.css')}}">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('boot/jquery.js')}}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <livewire:layout.navigation />
        <!-- Page Heading -->
        @if (isset($header))
<<<<<<< HEAD
        <header class="bg-dark text-white shadow" style="margin-top:1.72cm">
=======
        <header class=" shadow" style="margin-top:1.72cm" id="nav">
>>>>>>> e4928a94e7528b950fd520d57c0a8a8b85099b2a
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main style="margin-top:-1cm;">
            {{ $slot }}
        </main>
    </div>
</body>

</html>