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
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
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

        <header class="w-full bg-zinc-900 p-3 grid grid-cols-2 lg:grid-cols-3 items-center border-b border-zinc-700 z-30">
            <div class="flex items-center gap-2 cursor-default">
                <img
                    src="{{ $company->logo }}"
                    alt=""
                    class="max-w-8 aspect-square w-full object-cover rounded-full"
                >
                <img
                    src="/logos/Logo FarmaCarex.png"
                    alt=""
                    class="max-w-8 aspect-square w-full object-cover rounded-full"
                >
                <span class="text-sm lg:text-base text-nowrap">{{ $company->name }}</span>
            </div>

            <div class="hidden lg:flex lg:justify-center">
                <img
                    src="/logos/logo-psicolasa.png"
                    alt=""
                    class="w-full max-w-8 object-contain aspect-square rounded-full scale-125"
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


            {{-- <form
                action="{{ route('batteries.logout') }}"
                method="GET"
                class="justify-end hidden lg:flex"
            >
                @csrf
                <button
                    type="submit"
                    class=""
                >
                    
                </button>
            </form> --}}

            {{-- Small breakpoint menu button --}}
            <div class="flex justify-end gap-4 lg:hidden">
                <img
                    src="/logos/logo-psicolasa.png"
                    alt=""
                    class="w-full max-w-6 object-contain aspect-square rounded-full scale-125"
                >
                <button
                    type="button"
                    class="text-(--secondary-color) font-semibold flex items-center cursor-pointer hover:text-white menu-btn"
                >
                    <span><x-mary-icon name="o-bars-3" /></span>
                </button>
            </div>
        </header>

        <div class="flex h-full grow">
            <aside class="fixed top-14 left-0 lg:relative lg:top-0 z-20 w-full lg:w-max -translate-y-full lg:!translate-y-0 transition-all duration-300 ease-in-out" id="sideMenu">
                <x-mary-menu class="w-full lg:min-w-40 lg:w-max lg:h-full p-4 bg-zinc-900 border-r border-b lg:border-b-0 border-zinc-700">
                    @php
                        $url = request()->path();
                        $currentBatteryUrl = basename($url);
                    @endphp
    
                    @foreach($batteries as $battery)
                        @php
                            $active = $currentBatteryUrl == $battery->url 
                                ? 'bg-zinc-700' 
                                : '';
                        @endphp
                        <x-mary-menu-item
                            class="-ml-2 {{ $active }}"
                            href="{{ $battery->url }}"
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
                        href="{{ route('batteries.logout') }}"
                        class="-ml-2 mt-2 lg:hidden"
                    >
                        <div class="flex items-center gap-2">
                            <x-mary-icon name="o-arrow-right-on-rectangle" />                        
                            Salir
                        </div                        
                    </x-mary-menu-item>
                </x-mary-menu>
            </aside>
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
                    sideMenu.classList.toggle('-translate-y-full');
                })
            });
        </script>
    </body>
</html>