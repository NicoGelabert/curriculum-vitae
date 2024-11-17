<div class="home-hero-banner mt-16 flex" aria-label="Curriculum Vitae Nicolás Gelabert">
    <div class="container flex h-auto pt-8">
        <div class="md:w-1/12 lg:w-2/12 h-auto hidden md:flex items-center justify-start">
            <div class="flex flex-col justify-between h-full max-h-60">
                <ul class="flex flex-col gap-y-2">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <li>
                                <a class="flex items-center gap-x-1 opacity-50" href="{{ route('lang.switch', $lang) }}">
                                    <span class="flag-icon w-4 flag-icon-{{$language['flag-icon']}}"></span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="flex items-center gap-x-1" href="{{ route('lang.switch', $lang) }}">
                                    <span class="flag-icon w-4 flag-icon-{{$language['flag-icon']}}"></span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="relative flex gap-2 items-center">
                    <button class="toggle-theme relative inline-flex items-center w-6 rounded-full h-12 transition-colors bg-gray-200 dark:bg-gray-600 focus:outline-none">
                        <div class="flex flex-col justify-between w-full px-1 pt-px">
                            <i class="fi fi-rr-sun text-transparent dark:text-white"></i>
                            <i class="fi fi-br-moon text-black dark:text-transparent"></i>
                        </div>
                        <span class="sr-only">Toggle theme</span>
                        <span class="indicator absolute inline-block w-5 h-5 bg-white rounded-full shadow-sm transition-transform"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full md:w-10/12 lg:w-8/12 h-auto splide home-hero-banner-content">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($homeherobanners as $homeherobanner)
                    <li class="splide__slide mx-auto">
                        <div class="w-full flex flex-col md:flex-row md:justify-between gap-8">
                            <div class="flex flex-col justify-center gap-6 lg:gap-12 w-full md:w-1/2">
                                <div class="flex gap-4 items-center animate-icon">
                                    <p class="text-3xl">0{{ __($homeherobanner->id) }}</p>
                                </div>
                                <h1 class="animate-h1 text-4xl md:text-6xl leading-tight font-bold">{{ __($homeherobanner->headline) }}</h1>
                                <p class="animate-p">{{ __($homeherobanner->description) }}</p>
                                <div class="animate-button flex gap-4">
                                    <x-button href="https://demo.chimicreativo.es/" target="blank"><p>{{ __('Ver E-Commerce Demo') }}</p></x-button>
                                    <x-button href="#portfolio" class="btn-secondary"><p>{{ __('Ver Portfolio') }}</p></x-button>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 flex items-center">
                                <img src="{{ $homeherobanner->image }}" alt="{{ __($homeherobanner->title) }}" class="animate-img">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="md:w-1/12 lg:w-2/12 h-auto hidden md:flex items-center justify-end">
            <div class="flex flex-col justify-between h-full max-h-60 social-icons">
                <a href="https://wa.me/34623037048" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                    <i class="flex text-base leading-none fi fi-brands-whatsapp"></i>
                </a>
                <a href="mailto:nico.gelabert@gmail.com" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                    <i class="flex text-base leading-none fi fi-rr-envelope"></i>
                </a>
                <a href="https://github.com/NicoGelabert" class="h-6 w-6 aspect-square rounded-md p-2">
                    <i class="flex text-base leading-none fi fi-brands-github"></i>
                </a>
                <a href="https://www.behance.net/nicolasgelabert" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                    <i class="flex text-base leading-none fi fi-brands-behance"></i>
                </a>
                <a href="https://www.instagram.com/nicolas.gelabert.dg/" class="h-6 w-6 aspect-square rounded-md p-2" target="_blank">
                    <i class="flex text-base leading-none fi fi-brands-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/nicolasgelabert/" class="h-6 w-6 aspect-square rounded-md p-2">
                    <i class="flex text-base leading-none fi fi-brands-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
</div>