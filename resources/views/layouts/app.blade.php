<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>InnoVixus - @yield('title')</title>
</head>

<body class="font-inter bg-blue-50 text-gray-900">
    <main class="min-h-screen flex flex-col bg-blue-50">
        @include('components.navbar')
        <div class="flex-1">
            @yield('slot')
        </div>

        {{-- @hasSection('sweetAlert')
            <x-sweet-alert />
        @endif --}}

        <x-footer></x-footer>
    </main>
</body>
</html>
