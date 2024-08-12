<x-app-layout>

    <x-home-hero-banner :homeherobanners="$homeherobanners" />

    <hr class="divider" id="servicios"/>
    
    <x-experiences :experiences="$experiences"/>
    
    <hr class="divider" id="about"/>

    <x-educations :educations="$educations"/>

    <x-skills :skills="$skills"/>

    <!-- <x-benefits /> -->
    
    <!-- <x-features :features="$features"/> -->

    <!-- <x-coverage/> -->
    
    <hr class="divider" />
    
    <!-- <x-portfolio :projects="$projects" /> -->
    
    <!-- <x-clients :clients="$clients" /> -->
    
    <!-- <hr class="divider" /> -->
    
    <x-faq :faqs="$faqs"/>
    
    <hr class="divider" id="contact"/>

    <x-contact />

    <hr class="divider"/>
    
</x-app-layout>