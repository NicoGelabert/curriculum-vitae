<x-app-layout>

    <x-home-hero-banner :homeherobanners="$homeherobanners" />

    <hr class="my-8 border-t-0" id="experiencia"/>
    
    <x-experiences :experiences="$experiences" :experiencesJson="$experiencesJson"/>
    
    <hr id="educacion"/>

    <x-educations :educations="$educations" :educationsJson="$educationsJson"/>

    <hr id="habilidades" class="mt-16 md:mt-0 opacity-0"/>

    <x-skills :skills="$skills"/>
    
    <hr id="works" class="mt-16 opacity-0"/>
    
    <x-portfolio :projects="$projects" />
    
    <hr class="mt-16 mb-16 opacity-0" id="contact"/>

    <x-contact />

    <hr class="divider"/>
    
</x-app-layout>