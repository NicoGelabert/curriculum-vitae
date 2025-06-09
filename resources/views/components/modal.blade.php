@props([
    'experiences' => [],
    'experiencesJson' => [],
    'educations' => [],
    'educationsJson' => [],
])
@php
    $isExperience = count($experiencesJson);
    $items = $isExperience ? $experiences : $educations;
    $itemsJson = $isExperience ? $experiencesJson : $educationsJson;
@endphp

<script>
    function modalGallery() {
        return {
            isOpen: false,
            currentIndex: 0,
            items: [],

            get currentItem() {
                return this.items?.[this.currentIndex] || {};
            },

            init() {
                this.items = this.$el.dataset.items ? JSON.parse(this.$el.dataset.items) : [];
                console.log('Items cargados:', this.items);
            },

            open(index) {
                if (this.items[index]) {
                    this.currentIndex = index;
                    this.isOpen = true;
                }
            },

            next() {
                if (this.currentIndex < this.items.length - 1) this.currentIndex++;
            },

            prev() {
                if (this.currentIndex > 0) this.currentIndex--;
            },
        };
    }
</script>

<div x-data="modalGallery()" x-init="init()" data-items='@json($itemsJson)' class="w-full overflow-auto">

    <div class="splide modalSlider">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($items as $index => $item)
                <li class="splide__slide flex flex-col gap-4" @click.stop.prevent="open({{ $index }})">
                    <div class="flex flex-col-reverse gap-4 justify-center h-full text-center border border-gray-400 rounded-xl p-6 bg-gray-100 dark:bg-zinc-800 shadow-lg mb-4">
                        <div class="hidden md:block">
                            <p class="text-gray_lighter line-clamp-3 text-sm">{{ __($item -> description) }}</p>
                        </div>
                        <div class="w-full">
                            <p class="text-primary_light dark:text-primary_dark mb-4 text-xs">{{ __($item -> timelapse) }}</p>
                            <div class="flex flex-col gap-4 items-center">
                                <img src="{{ $item -> image }}" alt="" class="max-w-[40px] w-auto rounded-full object-contain align-top">
                                <div class="flex gap-4 items-center">
                                    @if ( $item -> company )
                                    <p class="text-gray_dark dark:text-gray_light/60">{{ $item -> company }}</p>
                                    @endif
                                    @if ( $item -> school )
                                    <p class="text-gray_dark dark:text-gray_light/60">{{ $item -> school }}</p>
                                    @endif
                                    @if ( $item -> site )
                                    <a href="{{ $item -> site }}" target="_blank">
                                        <x-new-window-icon />
                                    </a>
                                    @endif
                                    @if ( $item -> certificate )
                                    <a href="{{ $item -> certificate }}" target="_blank">
                                        <i class="fi fi-rs-diploma text-primary_light dark:text-primary_dark"></i>
                                    </a>
                                    @endif
                                </div>
                                <h5>{{ __($item -> title) }}</h5>
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
    <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 flex justify-center bg-white dark:bg-black bg-opacity-85 dark:bg-opacity-85 z-50 overflow-auto">
        <div class="mx-8 mt-8 mb-24 overflow-auto lg:my-auto lg:flex lg:flex-row lg:gap-8 w-full h-auto lg:max-w-screen-xl">
            <div class="lg:w-1/2 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <p class="text-primary_light dark:text-primary_dark text-xs" x-text="currentItem.timelapse"></p>
                    <h3 x-text="currentItem.title"></h3>
                    <div class="flex gap-4 items-center">
                        <template x-if="currentItem.site">
                            <a class="flex gap-4 items-center" :href="currentItem.site" target="_blank">
                                <img :src="currentItem.image" alt="" class="max-w-[40px] w-auto rounded-full object-contain align-top">
                                <p class="dark:text-gray_light/60" x-show="currentItem.company" x-text="currentItem.company"></p>
                                <p class="dark:text-gray_light/60" x-show="currentItem.school" x-text="currentItem.school"></p>
                                <x-new-window-icon class="h-4 w-auto"/>
                            </a>
                        </template>
    
                        <template x-if="!currentItem.site">
                            <div class="flex gap-4 items-center">
                                <img :src="currentItem.image" alt="" class="max-w-[40px] w-auto rounded-full object-contain align-top">
                                <p class="dark:text-gray_light/60" x-show="currentItem.company" x-text="currentItem.company"></p>
                                <p class="dark:text-gray_light/60" x-show="currentItem.school" x-text="currentItem.school"></p>
                            </div>
                        </template>
    
                        <a x-show="currentItem.certificate" :href="currentItem.certificate" target="_blank">
                            <x-certificate-icon class="h-4 w-auto"/>
                        </a>
                    </div>
                    <p x-html="currentItem.description"></p>
                </div>
            </div>
        </div>
        <div class="fixed bottom-4 right-4 flex w-auto gap-2">
            
            <button @click="prev" :class="currentIndex === 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''" class=" w-12 h-12 bg-primary_light dark:bg-primary_dark text-white dark:text-black p-2 rounded-full">❮</button>
            
          
            <button @click="next" :class="currentIndex === items.length - 1 ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''" class="w-12 h-12 bg-primary_light dark:bg-primary_dark text-white dark:text-black p-2 rounded-full">❯</button>

         
            <button @click="isOpen = false" class="w-12 h-12 bg-black text-white dark:bg-white dark:text-black p-2 rounded-full ml-4">✕</button>
        </div>
    </div>
</div>