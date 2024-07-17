
<div class="container flex flex-col md:flex-row items-start gap-8" id="services">
    <!-- Columna derecha: Listado de botones -->
    <div class="splide w-full md:w-1/2" id="btnService">
        <div class="splide__track">
            <ul class="splide__list flex flex-col gap-4">
                @foreach ($services as $service)
                <li class="splide__slide mx-auto w-full ">
                    <button class="service-button">
                        <div class="flex items-center">
                            <!-- Ícono del servicio -->
                            <i class="{{ $service->icon }} service-icon"></i>
                            <!-- Nombre del servicio -->
                            <span>{{ __($service->name) }}</span>
                        </div>
                        <!-- Círculo con una flecha dentro -->
                        <div class="service-bg-arrow">
                            <i class="fi fi-rr-arrow-small-right rotate-90 md:rotate-0"></i>
                        </div>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="servicesAttributes" class="splide w-full md:w-1/2 px-8 service-description" >
        <div class="splide__track h-fit">
            <ul class="splide__list ">
                @foreach($services as $service)
                <li class="splide__slide flex flex-col gap-4">
                    <h5>{{ __($service->name) }}</h5>
                    <ul class="flex flex-col gap-4">
                        @foreach($service->attributes as $attribute)
                        <li class="flex items-baseline gap-4">
                            <div class="w-[50px]">
                                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6157 0.372421C16.133 0.863738 16.1276 1.6551 15.6023 2.14017L7.87874 9.2749C7.3641 9.75872 6.68414 10 6.00284 10C5.32154 10 4.63625 9.75622 4.11494 9.26865L0.405808 5.89818C-0.123497 5.41687 -0.136829 4.62551 0.376477 4.13044C0.889783 3.63412 1.73374 3.62287 2.26171 4.10294L5.98551 7.48715L13.7304 0.359919C14.2584 -0.123898 15.0997 -0.120147 15.6157 0.372421Z" fill="#011627"/>
                                </svg>
                            </div>
                            {{ __($attribute->text) }}
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>