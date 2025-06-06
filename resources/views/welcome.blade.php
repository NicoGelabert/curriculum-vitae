<x-app-layout>

    <x-home-hero-banner :homeherobanners="$homeherobanners" />

    <hr class="my-8 border-t-0" id="experiencia"/>
    
    <x-experiences :experiences="$experiences" :experiencesJson="$experiencesJson"/>
    
    <hr class="divider" id="educacion"/>

    <x-educations :educations="$educations" :educationsJson="$educationsJson"/>

    <hr id="habilidades" class="mt-16 md:mt-0 opacity-0"/>

    <!-- <x-skills :skills="$skills"/> -->

    <!-- <x-benefits /> -->
    
    <!-- <x-features :features="$features"/> -->

    <!-- <x-coverage/> -->
    
    <!-- <x-portfolio :projects="$projects" /> -->
    
    <!-- <x-clients :clients="$clients" /> -->
    
    <!-- <hr class="divider" /> -->
    
    <!-- <x-faq :faqs="$faqs"/> -->
    
    <hr class="mt-8 mb-16 opacity-0" id="contact"/>

    <!-- <x-contact /> -->

    <hr class="divider"/>
    
</x-app-layout>