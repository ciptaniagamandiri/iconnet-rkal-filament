<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Iconnet.id - Layanan Internet Broadband dan TV dari Indonesia Comnets Plus (ICON+)')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('landing.components.navbar')
    <div class="min-h-screen">
        @yield('content')
    </div>
    @include('landing.components.footer')
</body>
</html>