<section class="container flex flex-col md:flex-row items-center gap-8" aria-label="Skills">
    <div class="h-fit vertical-text">
        <h3>Skills</h3>
    </div>
    <div id="skills" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($skills as $skill)
                <li class="splide__slide">
                    <div class="splide__slide_img">
                        <img src="{{ $skill -> image }}" alt="">
                    </div>
                    <p>{{ $skill -> name }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>