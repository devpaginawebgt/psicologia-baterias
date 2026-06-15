<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="dark"
    data-theme="dark"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Baterías - {{ config('app.name'); }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/js/app.js'])

        <style>
            .fieldset-legend, .fieldset-label, .text-error {
                font-size: 0.875rem;
                color: var(--secondary-color);
            }
        </style>
    </head>

    <body class="flex flex-col">
        <x-mary-toast position="toast-top toast-end" />

        {{-- <header class="fixed top-0 w-full bg-zinc-900 p-3 flex justify-between gap-8 lg:gap-0 lg:grid lg:grid-cols-3 items-center border-b border-zinc-700 z-30">
            <div class="flex items-center gap-2 cursor-default">
                <img
                    src="{{ $company->logo }}"
                    alt=""
                    class="max-w-8 sm:max-w-9 aspect-square w-full object-cover rounded-full"
                >
                <img
                    src="/logos/Logo FarmaCarex.png"
                    alt=""
                    class="max-w-8 sm:max-w-9 aspect-square w-full object-cover rounded-full"
                >
                <span class="ml-2 text-xs sm:text-sm lg:text-nowrap text-gray-300">
                    Estrategias para mejorar Inteligencia Emocional y Social
                </span>
            </div>

            <div class="hidden lg:flex lg:justify-center">
                <img
                    src="/logos/logo-psicolasa.png"
                    alt=""
                    class="w-full max-w-8 sm:max-w-9 object-contain aspect-square rounded-full scale-125"
                >
            </div>

            <div class="hidden lg:flex justify-end ">
                <a
                    href="{{ route('batteries.logout') }}"
                    class="text-sm text-(--secondary-color) font-semibold cursor-pointer hover:text-white logout-btn flex items-center gap-2"
                >
                    Salir
                    <x-mary-icon name="o-arrow-right-on-rectangle" />
                </a>
            </div>

            <div class="flex justify-end gap-4 lg:hidden">
                <img
                    src="/logos/logo-psicolasa.png"
                    alt=""
                    class="w-full max-w-8 object-contain aspect-square rounded-full scale-125"
                >
                <button
                    type="button"
                    class="text-(--secondary-color) font-semibold flex items-center cursor-pointer hover:text-white menu-btn"
                >
                    <span><x-mary-icon name="o-bars-3" /></span>
                </button>
            </div>
        </header> --}}

        <header class="fixed top-0 w-full bg-zinc-900 p-3 flex justify-between gap-8 lg:gap-0 items-center border-b border-zinc-700 z-30">
            <div class="flex items-center gap-2 cursor-default">
                <img
                    src="/logos/logo-psicolasa.png"
                    alt=""
                    class="w-full max-w-8 sm:max-w-9 object-contain aspect-square rounded-full scale-125"
                >
                <span class="ml-2 text-xs sm:text-sm lg:text-nowrap text-gray-300">
                    Estrategias para mejorar Inteligencia Emocional y Social
                </span>
            </div>

            <div class="flex justify-end ">
                <a
                    href="{{ route('batteries.logout') }}"
                    class="text-sm text-(--secondary-color) font-semibold cursor-pointer hover:text-white logout-btn hidden lg:flex items-center gap-2"
                >
                    Salir
                    <x-mary-icon name="o-arrow-right-on-rectangle" />
                </a>

                <button
                    type="button"
                    class="text-(--secondary-color) font-semibold flex lg:hidden items-center cursor-pointer hover:text-white menu-btn"
                >
                    <span><x-mary-icon name="o-bars-3" /></span>
                </button>
            </div>
        </header>
        
        <aside class="fixed top-14 min-[366px]:top-12 left-0 lg:top-0 z-20 w-full lg:max-w-60 -translate-y-[150%] lg:translate-y-0! lg:min-h-screen transition-all duration-500 ease-in-out" id="sideMenu">
            <x-mary-menu class="w-full lg:min-w-40 lg:w-max lg:max-w-60 lg:min-h-screen lg:h-full p-4 bg-zinc-900 border-r border-b lg:border-b-0 border-zinc-700 lg:pt-18">
                @php
                    $activeClass = 'bg-zinc-700';

                    $isActive = function (string ...$routeNames) use ($activeClass) {
                        return \Illuminate\Support\Facades\Route::is(...$routeNames) ? $activeClass : '';
                    };

                    $isActiveBattery = fn ($battery) =>
                        \Illuminate\Support\Facades\Route::is('batteries.select')
                            && request()->route('slug') === $battery->url
                                ? $activeClass
                                : '';
                @endphp

                <x-mary-menu-item
                    class="-ml-2 {{ $isActive('batteries.home') }}"
                    href="{{ route('batteries.home') }}"
                >
                    <div class="flex items-center gap-2">
                        <x-mary-icon
                            name="o-home"
                            class="w-5 mb-0.5"
                        />
                        Inicio
                    </div>
                </x-mary-menu-item>

                @foreach($batteries as $battery)
                    <x-mary-menu-item
                        class="-ml-2 {{ $isActiveBattery($battery) }}"
                        href="/baterias/{{ $battery->url_type }}/{{ $battery->url }}"
                    >
                        <div class="flex items-center gap-2">
                            <x-mary-icon
                                name="o-clipboard"
                                class="w-5"
                            />
                            {{ $battery->name }}
                        </div>
                    </x-mary-menu-item>
                @endforeach

                <x-mary-menu-item
                    class="-ml-2 {{ $isActive('batteries.materials') }}"
                    href="{{ route('batteries.materials') }}"
                >
                    <div class="flex items-center gap-2">
                        <x-mary-icon
                            name="o-folder"
                            class="w-5 mb-0.5"
                        />
                        Materiales
                    </div>
                </x-mary-menu-item>

                <x-mary-menu-item
                    class="-ml-2 {{ $isActive('batteries.workshops') }}"
                    href="{{ route('batteries.workshops') }}"
                >
                    <div class="flex items-center gap-2">
                        <x-mary-icon
                            name="o-calendar"
                            class="w-5 mb-0.5"
                        />
                        Talleres
                    </div>
                </x-mary-menu-item>

                {{-- @if (!$employee->is_admin)
                    <x-mary-menu-item
                        class="-ml-2 {{ $isActive('results') }}"
                        href="{{ route('results') }}"
                    >
                        <div class="flex items-center gap-2">
                            <x-mary-icon
                                name="o-document-text"
                                class="w-5 mb-0.5"
                            />
                            Resultados
                        </div>
                    </x-mary-menu-item>
                @endif --}}

                @if($employee->is_admin)
                    <x-mary-menu-item
                        class="-ml-2 {{ $isActive('batteries.dashboard') }}"
                        href="{{ route('batteries.dashboard') }}"
                    >
                        <div class="flex items-center gap-2">
                            <x-mary-icon
                                name="o-presentation-chart-line"
                                class="w-5 mb-0.5"
                            />
                            Dashboard
                        </div>
                    </x-mary-menu-item>

                    <x-mary-menu-item
                        class="-ml-2 {{ $isActive('batteries.report.employees') }}"
                        href="{{ route('batteries.report.employees') }}"
                    >
                        <div class="flex items-center gap-2">
                            <x-mary-icon
                                name="o-users"
                                class="w-5 mb-0.5"
                            />
                            Reporte de empleados
                        </div>
                    </x-mary-menu-item>
                @endif

                <x-mary-menu-item
                    href="{{ route('batteries.logout') }}"
                    class="-ml-2 mt-2 lg:hidden"
                >
                    <div class="flex items-center gap-2">
                        <x-mary-icon name="o-arrow-right-on-rectangle" />                        
                        Salir
                    </div                        
                </x-mary-menu-item>

                <div class="w-full flex justify-center items-center flex-wrap mt-auto gap-3 lg:gap-2 pt-4">
                    <img
                        src="{{ $company->logo }}"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="Farmacia Ascavi"
                    >
                    <img
                        src="/logos/Logo FarmaCarex.png"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="FarmaCarex"
                    >
                    <img
                        src="/logos/logo-el-punto.png"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="Farmacia El Punto"
                    >
                    {{-- <img
                        src="/logos/logo-selectpharma.png"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="Selectpharma"
                    >
                    <img
                        src="/logos/logo-medpharma.png"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="Medpharma"
                    >
                    <img
                        src="/logos/logo-leven.png"
                        alt=""
                        class="max-w-10 aspect-square w-full object-cover rounded-full"
                        title="Leven"
                    > --}}
                </div>
            </x-mary-menu>
        </aside>

        <div class="mt-20 min-[357px]:mt-16 lg:mt-16 lg:pl-58 w-full">
            {{ $slot }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.addEventListener('click', (e) => {
                    if (e.target.matches('.logout-btn')) {
                        document.querySelectorAll('button')
                            .forEach(button => button.disabled = true);
                    }
                });

                const sideMenu = document.getElementById('sideMenu');
                const menuBtn = document.querySelector('.menu-btn');

                menuBtn.addEventListener('click', () => {
                    sideMenu.classList.toggle('-translate-y-[150%]');
                })
            });
        </script>
    </body>
</html>