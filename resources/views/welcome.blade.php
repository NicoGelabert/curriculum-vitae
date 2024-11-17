<x-app-layout>

    <x-home-hero-banner :homeherobanners="$homeherobanners" />

    <hr class="divider" id="experiencia"/>
    
    <x-experiences :experiences="$experiences"/>
    
    <hr class="divider" id="educacion"/>

    <x-educations :educations="$educations"/>

    <hr id="habilidades" class="mt-16 md:mt-0"/>

    <x-skills :skills="$skills"/>

    <!-- <x-benefits /> -->
    
    <!-- <x-features :features="$features"/> -->

    <!-- <x-coverage/> -->
    
    <hr class="md:mb-16 opacity-0" id="portfolio"/>
    
    <x-portfolio :projects="$projects" />
    
    <!-- <x-clients :clients="$clients" /> -->
    
    <!-- <hr class="divider" /> -->
    
    <!-- <x-faq :faqs="$faqs"/> -->
    
    <hr class="mt-8 mb-16 opacity-0" id="contact"/>

    <x-contact />

    <hr class="divider"/>
    
</x-app-layout>