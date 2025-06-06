<div class="container" id="experiences">
    <div class=" flex flex-col md:flex-row gap-8 md:gap-16 mb-8 border-t border-t-gray_primary dark:border-t-zinc-800 py-16">
        <div class="h-fit vertical-text">
            <h3>{{ __('Experiencia') }}</h3>
        </div>
        <x-modal :experiences="$experiences" :experiencesJson="$experiencesJson"/>
    </div>
</div>