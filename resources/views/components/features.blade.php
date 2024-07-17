<div class="container flex flex-col gap-8">
    <h3 class="text-center">{{ __('Nuestros servicios incluyen') }}</h3>
    <div class="flex flex-col md:flex-row gap-8 ">
        <div class="w-full md:w-1/2 flex flex-col pt-6 md:pt-12 gap-8">
            @foreach ($features as $feature)
                <div class="w-full flex items-start gap-4">
                    <img src="{{ $feature->image }}" alt="{{ $feature->title }}" class="max-w-5 pt-2">
                    <div class="flex flex-col gap-4">
                        <h4 class="">{{ __($feature->title) }}</h4>
                        <p class="text-slate-400">{{ __($feature->description) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full md:w-1/2 flex flex-col pt-6 md:pt-12 gap-16 items-center">
            <div class="flex flex-col gap-4 items-center">
                <h4 class="uppercase text-center">{{ __('¿Tiene una urgencia? Contáctenos.') }}</h4>
                <div class="flex text-2xl font-bold">
                    <a href="tel:+34615338966">
                        <div class="btn-urgencies">
                        <i class="fi fi-rr-phone-call"></i>
                            {{ __('Urgencias') }}
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-3 md:gap-6">
                <div class="w-1/3 gap-y-4 flex flex-col">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/aire-acondicionado.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/fontaneria-2.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/electricidad-2.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                </div>
                <div class=" w-1/3 gap-y-4 flex flex-col">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/fontaneria.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/electricidad-2.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/aire-acondicionado-2.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                </div>
                <div class=" w-1/3 gap-y-4 flex flex-col">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/reformas.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/aire-acondicionado-3.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/img/electricidad.webp') }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>