<div class="container flex flex-col md:flex-row splide gap-4 md:gap-16" id="experiences">
    <div class="h-fit vertical-text">
        <h3>{{ __('Experiencia') }}</h3>
    </div>
    <div class="splide__track md:mr-24">
        <ul class="splide__list">
            @foreach ($experiences as $experience)
            <li class="splide__slide flex flex-col gap-4 mb-20">
                <div class="flex flex-col-reverse md:flex-row-reverse gap-8 justify-between md:justify-end items-start">
                    <div class="flex flex-col gap-4">
                        <p class="text-primary_light dark:text-primary_dark">{{ __($experience -> timelapse) }}</p>
                        <h5>{{ __($experience -> title) }}</h5>
                        <div class="flex gap-4 items-center">
                            <p class="text-gray_dark">{{ $experience -> company }}</p>
                            @if ( $experience -> site )
                            <a href="{{ $experience -> site }}" target="_blank">
                                <x-new-window-icon />
                            </a>
                            @endif
                        </div>
                        <p class="text-gray_lighter">{{ __($experience -> description) }}</p>
                    </div>
                    <img src="{{ $experience -> image }}" alt="" class="max-w-[75px] w-auto rounded-full object-contain align-top">
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="w-full md:h-full md:absolute right-12 top-0 md:max-w-[20rem] md:rotate-90">
        <div class="my-slider-progress">
            <div class="my-slider-progress-bar"></div>
        </div>
    </div>
</div>