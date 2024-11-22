<div class="btns-port-web mb-32 mt-12">
    <a href="{{ App::getLocale() === 'es' 
            ? asset('storage/files/Curriculum-Vitae-Nicolas-Gelabert-ES.pdf') 
            : asset('storage/files/Curriculum-Vitae-Nicolas-Gelabert-EN.pdf') }}" download="Curriculum-Vitae-Nicolas-Gelabert" class="flex justify-center items-center">
        <div class="h-16 w-16 p-4 rounded-full absolute">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="fill-primary_light dark:fill-primary_dark">
                <path d="m22,16V3h-7v1h6v12h-5.707l-1,1h-4.586l-1-1H3V4h6v-1H2v13H0v2.5c0,1.379,1.122,2.5,2.5,2.5h19c1.379,0,2.5-1.121,2.5-2.5v-2.5h-2Zm1,2.5c0,.827-.673,1.5-1.5,1.5H2.5c-.827,0-1.5-.673-1.5-1.5v-1.5h7.293l1,1h5.414l1-1h7.293v1.5Zm-11.5-7.707V0h1v10.793l3.146-3.146.707.707-3.293,3.293c-.292.292-.676.438-1.061.438s-.768-.146-1.061-.438l-3.293-3.293.707-.707,3.146,3.146Z"/>
            </svg>
        </div>
        <div class="text-rotate">
            <svg viewBox="0 0 100 100">
                <path d="M 0,50 a 50,50 0 1,1 0,1 z" id="circle" />
                <text>
                    <textPath xlink:href="#circle">
                        {{ __('Descargar Curriculum Vitae') }}
                    </textPath>
                </text>
            </svg>
        </div>
    </a>
</div>