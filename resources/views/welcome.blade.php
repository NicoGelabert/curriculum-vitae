<x-app-layout>

    <x-home-hero-banner :homeherobanners="$homeherobanners" />

    <hr class="divider" id="experiencia"/>
    
    <x-experiences :experiences="$experiences"/>
    
    <hr class="divider" id="educacion"/>

    <x-educations :educations="$educations"/>

    <hr class="opacity-0" id="habilidades"/>

    <x-skills :skills="$skills"/>

    <!-- <x-benefits /> -->
    
    <!-- <x-features :features="$features"/> -->

    <!-- <x-coverage/> -->
    
    <hr class="my-8 opacity-0" id="portfolio"/>
    
    <x-portfolio :projects="$projects" />
    
    <!-- <x-clients :clients="$clients" /> -->
    
    <!-- <hr class="divider" /> -->
    
    <!-- <x-faq :faqs="$faqs"/> -->
    
    <hr class="divider" id="contact"/>

    <x-contact />

    <hr class="divider"/>
    
</x-app-layout>