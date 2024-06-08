<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>welcome!</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('boot/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('boot/css-ui.css')}}">
    <link rel="stylesheet" href="{{asset('boot/app.css')}}">
    <script src="{{asset('boot/app.js')}}"></script>

    <!-- Scripts -->
</head>

<body class="antialiased">
    <div class="navbar-dark text-white fixed-top align-right">
        @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif
    </div>
    <center style="margin-top:4cm">
        <h1>
            Bienvenue!
        </h1>
    </center>
</body>

</html>