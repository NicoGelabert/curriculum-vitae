<header
    x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        updateButtonState() {
            const buttons = document.querySelectorAll('.openbtn');
            buttons.forEach(btn => {
                if (this.mobileMenuOpen) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }
    }"
    x-effect="updateButtonState()"
    @cart-change.window="cartItemsCount = $event.detail.count"
    class="flex justify-between md:justify-center z-10 w-full py-4 md:py-0"
    id="navbar"
>
    <div class="logo flex items-center ml-6 md:hidden">
        <x-application-logo/>
    </div>

    <!-- Responsive Menu -->
    <div
        class="block fixed z-10 top-0 bottom-0 height h-full w-full transition-all mobile-menu md:hidden p-4"
        :class="mobileMenuOpen ? 'left-0' : 'left-full'"
    >
        <div class="flex flex-col justify-between items-center h-full py-12 gap-8">
            <div class="logo-hamburguer">
                <x-application-logo/>
            </div>
            <ul class="w-full flex flex-col items-center gap-y-12">
                <li class="relative text-xl" @click="mobileMenuOpen = false">
                    <a href="#experiencia">
                        {{ __('Experiencia') }}
                    </a>
                </li>
                <li class="relative text-xl" @click="mobileMenuOpen = false">
                    <a href="#educacion">
                        {{ __('Educación') }}
                    </a>
                    <!-- <ul
                        class="flex flex-col gap-2 py-4 ml-12"
                    >
                        @foreach ($services as $service)
                            <li>
                                <a href="{{ route('service.view', $service->slug) }}">
                                    <span class="text-2xl font-normal">{{ __($service->name) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul> -->
                </li>
                <li class="relative text-xl" @click="mobileMenuOpen = false">
                    <a href="#habilidades">
                        {{ __('Skills') }}
                    </a>
                </li><li class="relative text-xl" @click="mobileMenuOpen = false">
                    <a href="#about">
                        {{ __('Portfolio') }}
                    </a>
                </li>
                <li class="relative text-xl" @click="mobileMenuOpen = false">
                    <a href="#contact">
                        {{ __('Contacto') }}
                    </a>
                </li>
            </ul>
            <div class="flex justify-center gap-4 social-icons text-black">
                <a href="https://wa.me/34623037048" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-whatsapp"></i>
                </a>
                <a href="mailto:nico.gelabert@gmail.com" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-rr-envelope"></i>
                </a>
                <a href="https://github.com/NicoGelabert" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-github"></i>
                </a>
                <a href="https://www.behance.net/nicolasgelabert" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-behance"></i>
                </a>
                <a href="https://www.instagram.com/nicolas.gelabert.dg/" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/nicolasgelabert/" class="h-10 w-10 aspect-square" target="_blank">
                    <i class="flex text-2xl leading-none fi fi-brands-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
    <!--/ Responsive Menu -->

    <nav class="hidden md:flex w-full max-w-screen-xl mx-4 justify-between items-center">
        <div class="logo flex justify-center">
            <x-application-logo/>
        </div>
        <ul class="grid grid-flow-col items-center justify-end gap-2 lg:gap-4">
            <!-- Idiomas -->
            <!-- <li x-data="{open: false}" class="relative h-full">
                <a
                    @click="open = !open"
                    class="cursor-pointer flex items-center px-navbar-item h-full"
                    :class="{'w-full': open}"
                >
                    <span class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                    <span class="text-sm">{{ Config::get('languages')[App::getLocale()]['display'] }}</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <ul
                    @click.outside="open = false"
                    x-show="open"
                    x-transition
                    x-cloak
                    class=" dropdown"
                >
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <li class="py-lang-navbar-item px-navbar-item">
                                <a class="flex items-center" href="{{ route('lang.switch', $lang) }}">
                                    <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                    <span class="text-xs">{{ $language['display'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li> -->

            <!-- Tema -->
            <!-- <li>
                <div class="relative flex gap-2 items-center">
                    <button class="toggle-theme relative inline-flex items-center h-6 rounded-full w-12 transition-colors bg-gray-200 dark:bg-gray-600 focus:outline-none">
                        <div class="flex justify-between w-full px-1 pt-px">
                            <i class="fi fi-rr-sun text-transparent dark:text-white"></i>
                            <i class="fi fi-br-moon text-black dark:text-transparent"></i>
                        </div>
                        <span class="sr-only">Toggle theme</span>
                        <span class="indicator absolute left-0 inline-block w-5 h-5 bg-white rounded-full shadow-sm transition-transform"></span>
                    </button>
                </div>
            </li> -->

            <!-- Servicios -->
            <li x-data="{open: false}" class="relative">
                <!-- <a
                    @click="open = !open"
                    :class="{'w-full': open}"
                    class="cursor-pointer flex items-center px-navbar-item w-max"
                > -->
                <a href="#experiencia" class="cursor-pointer flex items-center px-navbar-item w-max">
                <i class="fi fi-sr-display-code pr-2"></i>
                {{ __('Experiencia') }}
                <!-- <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    />
                </svg> -->
                </a>
                <!-- <ul
                    @click.outside="open = false"
                    x-show="open"
                    x-transition
                    x-cloak
                    class="dropdown"
                >
                    @foreach ($services as $service)
                        <li class="py-lang-navbar-item" >
                            <a href="{{ route('service.view', $service->slug) }}">
                                <span class="text-xs">{{ __($service->name) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul> -->
            </li>
            <!-- Educación -->
            <li class="relative">
                <a href="#educacion"
                    class="cursor-pointer flex items-center px-navbar-item w-max"
                >
                    <i class="fi fi-sr-diploma pr-2"></i>
                    {{ __('Educación') }}
                </a>
            </li>
            <!-- Educación -->
            <li class="relative">
                <a href="#habilidades"
                    class="cursor-pointer flex items-center px-navbar-item w-max"
                >
                    <i class="fi fi-sr-settings-sliders pr-2"></i>
                    {{ __('Skills') }}
                </a>
            </li>
            <!-- Educación -->
            <li class="relative">
                <a href="#about"
                    class="cursor-pointer flex items-center px-navbar-item w-max"
                >
                    <i class="fi fi-sr-customize-computer pr-2"></i>
                    {{ __('Portfolio') }}
                </a>
            </li>
            <!-- Contacto -->
            <li class="relative">
                <a href="#contact"
                    class="cursor-pointer flex items-center px-navbar-item w-max"
                >
                    <i class="fi fi-sr-attribution-pencil pr-2"></i>
                    {{ __('Contacto') }}
                </a>
            </li>
            <!-- <li>
                <div class="flex justify-center gap-4 social-icons">
                    <a href="https://wa.me/34615338966" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                        <i class="flex text-base leading-none fi fi-brands-whatsapp"></i>
                    </a>
                    <a href="https://www.instagram.com/urquizasoluciones/?hl=es-es" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                        <i class="flex text-base leading-none fi fi-brands-instagram"></i>
                    </a>
                    <a href="#zona-de-cobertura" class="h-6 w-6 aspect-square rounded-md p-2">
                        <i class="flex text-base leading-none fi fi-rs-map-marker"></i>
                    </a>
                </div>
            </li> -->
        </ul>
    </nav>

    <div class="flex items-center md:hidden">
        <div x-data="{open: false}" class="relative">
            <a
                @click="open = !open"
                class="cursor-pointer flex items-center px-navbar-item pr-5 py-4"
                :class="{'w-full': open}"
            >
                <span class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                <span class="text-sm">{{ Config::get('languages')[App::getLocale()]['display'] }}</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
            <ul
                @click.outside="open = false"
                x-show="open"
                x-transition
                x-cloak
                class=" dropdown"
            >
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <li class="py-lang-navbar-item px-navbar-item">
                            <a class="flex items-center" href="{{ route('lang.switch', $lang) }}">
                                <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                <span class="text-xs">{{ $language['display'] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="relative flex gap-2 items-center">
            <button class="toggle-theme relative inline-flex items-center h-6 rounded-full w-12 transition-colors bg-gray-200 dark:bg-gray-600 focus:outline-none">
                <div class="flex justify-between w-full px-1 pt-px">
                    <i class="fi fi-rr-sun text-transparent dark:text-white"></i>
                    <i class="fi fi-br-moon text-black dark:text-transparent"></i>
                </div>
                <span class="sr-only">Toggle theme</span>
                <span class="indicator absolute left-0 inline-block w-5 h-5 bg-white rounded-full shadow-sm transition-transform"></span>
            </button>
        </div>
        <x-hamburguer />
    </div>
</header>

</style>
<script>
    var prevScrollpos = window.pageYOffset;
    var navbar = document.getElementById("navbar");
    // navbar.style.top = "5px";
    var scrollThreshold = 15; // Umbral de desplazamiento mínimo antes de ocultar el encabezado
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        var scrollDifference = Math.abs(prevScrollpos - currentScrollPos);
        if (scrollDifference >= scrollThreshold) {
            if (prevScrollpos > currentScrollPos) {
                navbar.style.top = "0";
            } else {
                navbar.style.top = "-110px";
            }
        }
        prevScrollpos = currentScrollPos;

        var distanceFromTop = Math.abs(window.scrollY);
        if(distanceFromTop <= 5){
            document.getElementById("navbar").classList.remove("scrolled-bottom");
        }else{
            document.getElementById("navbar").classList.add("scrolled-bottom");
        }
    }
</script>