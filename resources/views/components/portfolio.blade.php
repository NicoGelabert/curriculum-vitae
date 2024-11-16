<div class="container flex flex-col md:flex-row gap-4" id="portfolio">
    <div class="h-fit vertical-text md:w-1/12">
        <h3>Portfolio</h3>
    </div>
    <div class="relative w-full md:w-11/12 gap-8 flex flex-col">
        <div id="main-carousel" class="splide" aria-label="Portfolio">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($projects as $project)
                    <li class="splide__slide flex flex-col-reverse justify-end md:flex-row gap-8">
                        <div class="w-full md:w-1/2 flex justify-center items-start md:pr-4">
                            <img src="{{ $project->image }}" alt="{{ $project->name }}" class="h-fit">
                        </div>
                        <div class="flex flex-col gap-4 w-1/2">
                            <div class="flex justify-between">
                                <h5>{{ $project->title }}</h5>
                            </div>
                            <ul>
                                @foreach($project->clients as $client)
                                <li class="">{{ $client->name }}</li>
                                @endforeach
                            </ul>
                            <ul class="hidden md:flex flex-wrap gap-2">
                                @foreach($project->tags as $tag)
                                <li class="mt-1 bg-gray-50 text-xs w-fit rounded-full px-2 py-1 text-black dark:bg-black_light dark:text-gray_primary">{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="thumbnail-carousel" class="splide relative md:absolute bottom-0 right-0 w-full md:w-1/2" aria-label="Puede ver todos nuestros trabajos.">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach($projects as $project)
                        <li class="splide__slide">
                            <div>
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="aspect-square bg-cover">
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>