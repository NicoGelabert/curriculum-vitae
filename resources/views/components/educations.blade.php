<div class="container" id="education">
    <div class=" flex flex-col md:flex-row gap-8 md:gap-16 mb-8 border-t border-t-gray_primary dark:border-t-zinc-800 py-16">
        <div class="h-fit vertical-text">
            <h3>{{ __('educación') }}</h3>
        </div>
        <x-modal :educations="$educations" :educationsJson="$educationsJson"/>
    </div>
</div>