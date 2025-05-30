<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <style>
            .fieldset-legend, .fieldset-label, .text-error {
                font-size: 0.875rem;
                color: var(--secondary-color);
            }
        </style>
    </head>

    <body class="flex flex-col">
        <header class="w-full bg-zinc-900 p-3 grid grid-cols-2 lg:grid-cols-3 items-center border-b border-zinc-700">
            <div class="flex items-center gap-3 cursor-default">
                <img
                    src="{{ $company->logo }}"
                    alt=""
                    class="max-w-8 aspect-square w-full object-cover rounded-full"
                >
                <span class="text-sm lg:text-base">{{ $company->name }}</span>
            </div>

            <div class="hidden lg:flex lg:justify-center">
                <img
                    src="/logos/Logo Loasa.png"
                    alt=""
                    class="w-full max-w-8 object-contain aspect-square rounded-full scale-125"
                >
            </div>

            <form
                action="{{ route('batteries.logout') }}"
                method="POST"
                id="logoutForm"
                class="flex justify-end"
            >
                @csrf
                <button
                    type="submit"
                    class="text-sm text-(--secondary-color) font-semibold flex items-center gap-1 cursor-pointer hover:text-white"
                >
                    Salir
                    <x-mary-icon name="o-arrow-right-on-rectangle" />
                </button>
            </form>
        </header>

        <div class="flex h-full grow">
            <x-mary-menu class="p-4 bg-zinc-900 min-w-40 w-max border-r border-zinc-700 hidden lg:flex">
                @foreach($batteries as $battery)
                    <x-mary-menu-item class="-ml-2" href="{{ $battery->url }}">
                        <div class="flex items-center gap-2">
                            <x-mary-icon
                                name="o-clipboard"
                                class="w-5"
                            />
                            {{ $battery->name }}
                        </div>
                    </x-mary-menu-item>
                @endforeach
            </x-mary-menu>
            {{ $slot }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const logoutForm = document.getElementById('logoutForm');

                if (logoutForm) {
                    logoutForm.addEventListener('submit', function () {
                        document.querySelectorAll('button').forEach(function (btn) {
                            btn.disabled = true;
                        });
                    });
                }
            });
        </script>
    </body>
</html>