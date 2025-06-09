<footer>
    <div class="footer-container">
        <div class="flex flex-col items-center gap-y-4">
            <div class="logo footer-logo">
                <x-application-logo />
                <x-social-icons />
            </div>
            <p class="">Málaga, Costa del Sol.</p>
        </div>
        <div class="footer-menu">
            <div>
                <a href="#experiencia">
                    <h6>{{ __('Experiencia') }}</h6>
                </a>
            </div>
            <div>
                <a href="#aducacion">
                    <h6>{{ __('Educación') }}</h6>
                </a>
            </div>
            <div>
                <a href="#habilidades">
                    <h6>{{ __('Skills') }}</h6>
                </a>
            </div>
            <div>
                <a href="#works">
                    <h6>{{ __('Portfolio') }}</h6>
                </a>
            </div>
            <div>
                <a href="#contact">
                    <h6>{{ __('Contacto') }}</h6>
                </a>
            </div>
        </div>
    </div>
    <hr class="footer-divider" />
    <div class="post-footer">
        <span class="developed-by">{{__('Sitio diseñado y desarrollado por')}}<a href="https://nicolasgelabert.com.ar" target="_blank"> Nicolás Gelabert</a></span>
        <ul class="flex gap-x-4">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <li>
                        <a class="flex items-center gap-x-1 opacity-50" href="{{ route('lang.switch', $lang) }}">
                            <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span>
                            <span>{{$language['display']}}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="flex items-center gap-x-1" href="{{ route('lang.switch', $lang) }}">
                            <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span>
                            <span>{{$language['display']}}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</footer>