@props(['experiences', 'experiencesJson'])
<script>
    function modalGallery() {
        return {
            isOpen: false,
            currentIndex: 0,
            experiences: @json($experiencesJson),
            get currentExperience() {
                return this.experiences[this.currentIndex];
            },
            init() {},
            open(index) {
                this.currentIndex = index;
                this.isOpen = true;
            },
            next() {
                if (this.currentIndex < this.experiences.length - 1) this.currentIndex++;
            },
            prev() {
                if (this.currentIndex > 0) this.currentIndex--;
            },
        };
    }
</script>
<div x-data="modalGallery()" x-init="init()" class="w-full overflow-auto">
    <div class="splide"  id="experiencesSlider">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($experiences as $index => $experience)
                <li class="splide__slide flex flex-col gap-4" @click="open({{ $index }})">
                    <div class="flex flex-col-reverse gap-4 justify-center h-full text-center border border-gray-400 rounded-xl p-6 bg-gray-100 dark:bg-zinc-800 shadow-lg mb-4">
                        <div class="hidden md:block">
                            <p class="text-gray_lighter line-clamp-3 text-sm">{{ __($experience -> description) }}</p>
                        </div>
                        <div class="w-full">
                            <p class="text-primary_light dark:text-primary_dark mb-4 text-xs">{{ __($experience -> timelapse) }}</p>
                            <div class="flex flex-col gap-4 items-center">
                                <img src="{{ $experience -> image }}" alt="" class="max-w-[40px] w-auto rounded-full object-contain align-top">
                                <div class="flex gap-4 items-center">
                                    <p class="text-gray_dark dark:text-gray_light/60">{{ $experience -> company }}</p>
                                    @if ( $experience -> site )
                                    <a href="{{ $experience -> site }}" target="_blank">
                                        <x-new-window-icon />
                                    </a>
                                    @endif
                                </div>
                                <h5>{{ __($experience -> title) }}</h5>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-full mx-auto">
                <div class="my-slider-progress">
                    <div class="my-slider-progress-bar"></div>
                </div>
            </div>
            <div class="splide__arrows splide__arrows--ltr">
            </div>
        </div>
    </div>
    <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 flex justify-center bg-black bg-opacity-75 dark:bg-opacity-85 z-50 overflow-auto">
        <div class="mx-8 mt-8 mb-24 overflow-auto lg:my-auto lg:flex lg:flex-row lg:gap-8 w-full h-auto lg:max-w-screen-xl">
            <!-- <div class="lg:w-1/2 flex flex-col mb-4 justify-start items-start">
                <img :src="currentProject.image" class="w-full h-auto object-contain max-h-[70vh]">
            </div> -->
            <div class="text-white lg:w-1/2 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <h3 x-text="currentExperience.title"></h3>
                    <a class="flex gap-4 items-center" x-show="currentExperience.site" :href="currentExperience.site" target="_blank">
                        <img :src="currentExperience.image" alt="" class="max-w-[40px] w-auto rounded-full object-contain align-top">
                        <p class="text-gray_dark dark:text-gray_light/60" x-text="currentExperience.company"></p>
                        <x-new-window-icon />
                    </a>
                    <p x-html="currentExperience.description"></p>
                    <!-- <div>
                        <ul class="flex gap-2 flex-wrap">
                            <template x-for="tag in currentProject.tags" :key="tag">
                                <li class="mt-1 bg-gray-50 text-xxs w-fit rounded-lg px-2 py-1 text-black" x-text="tag"></li>
                            </template>
                        </ul>
                    </div> -->
                </div>
                <!-- <a :href="`/servicios/${currentProject.service_slug}/${currentProject.slug}`" class="text-xs btn-primary">Ver proyecto completo</a> -->
            </div>
        </div>
        <div class="fixed bottom-4 right-4 flex w-auto gap-2">
            <!-- Flecha Anterior -->
            <button @click="prev" :class="currentIndex === 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''" class=" w-12 h-12 bg-primary_light dark:bg-primary_dark text-white dark:text-black p-2 rounded-full">❮</button>
            
            <!-- Flecha Siguiente -->
            <button @click="next" :class="currentIndex === experiences.length - 1 ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''" class="w-12 h-12 bg-primary_light dark:bg-primary_dark text-white dark:text-black p-2 rounded-full">❯</button>

            <!-- Botón Cerrar -->
            <button @click="isOpen = false" class="w-12 h-12 bg-black text-white dark:bg-white dark:text-black p-2 rounded-full ml-4">✕</button>
        </div>
    </div>
</div>