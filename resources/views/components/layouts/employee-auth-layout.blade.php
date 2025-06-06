<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="dark"
    data-theme="dark"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login - {{ config('app.name'); }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/js/app.js'])

        {{--? Flatpickr  --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        {{-- MonthSelectPlugin  --}}
        <script src="https://unpkg.com/flatpickr/dist/plugins/monthSelect/index.js"></script>
        <link href="https://unpkg.com/flatpickr/dist/plugins/monthSelect/style.css" rel="stylesheet">
    </head>

    <body class="flex justify-center items-center py-8 px-4">
        {{ $slot }}
    </body>
</html>