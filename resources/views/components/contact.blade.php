<div class="container mb-16 flex flex-col md:flex-row items-start gap-16" id="contact">
    <div class="w-full flex flex-col md:w-1/2 gap-8">
        <h3 class="text-left">{{ __('¡Conectemos!')}}</h3>
        <div class="flex flex-col justify-between items-start gap-8">
            <p class="text-lg leading-8 text-gray-500">{{ __('Si tiene alguna pregunta o deseas hablar sobre oportunidades de colaboración, no dudes en contactarme. Estoy disponible para nuevas propuestas y proyectos.') }}</p>
            <x-social-icons />
        </div>
    </div>
    <div class="flex flex-col w-full md:w-1/2">
        <form id="contactForm" action="{{ route('contact.store') }}" method="post" class="flex gap-2 w-full form">
        @csrf
            <div class="flex flex-col gap-6 w-full">
                <input id="nameInput" type="text" name="name" placeholder="{{ __('Su nombre') }}" required class="account w-full">
                <input id="emailInput" type="email" name="email" placeholder="{{ __('Su correo electrónico') }}" required class="account w-full">
                <input id="phoneInput" type="tel" name="phone" placeholder="{{ __('Su teléfono') }}" required class="account w-full" pattern="[0-9]{9}">
                <!-- <select name="area" required id="areaInput">
                    <option value="">{{ __('Zona del trabajo') }}</option>
                    <option value="Málaga">Málaga</option>
                    <option value="Torremolinos">Torremolinos</option>
                    <option value="Benalmádena">Benalmádena</option>
                    <option value="Los Boliches">Los Boliches</option>
                    <option value="Mijas">Mijas</option>
                    <option value="Fuengirola">Fuengirola</option>
                    <option value="Calahonda">Calahonda</option>
                    <option value="Marbella">Marbella</option>
                </select> -->
                <textarea id="messageInput" name="message" placeholder="{{__('Deje un mensaje') }}" rows="4" required class="account w-full"></textarea>
                <div class="g-recaptcha" data-sitekey="6LcjHtMpAAAAAII4PAM3Vh2hT-0RDntu6B-3a_pH"></div>
                <x-button id="subscribeBtn" type="submit">{{__('Enviar')}}</x-button>
            </div>
        </form>
        <div id="successMessage" class="mx-auto" style="display: none;">
            <H4 class="text-center">{{ __('Mensaje Enviado!') }}</H4>
            <img src="{{ asset('storage/img/mensaje-enviado.gif')}}" alt="Mensaje enviado">
        </div>
        <div id="errorMessage" class="mx-auto" style="display: none;">
        {{ __('El envío falló. Vuelva a intentar, por favor.') }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        form.addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            const name = document.getElementById('nameInput').value;
            const email = document.getElementById('emailInput').value;
            const phone = document.getElementById('phoneInput').value;
            const area = document.getElementById('areaInput').value;
            const message = document.getElementById('messageInput').value;
            try {
                const response = await fetch('{{ route("contact.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ name, email, phone, area, message })
                });

                const data = await response.json();
                if (response.ok) {
                    successMessage.style.display = 'block';
                    form.style.display = 'none';
                } else {
                    errorMessage.style.display = 'block';
                }
            } catch (error) {
                errorMessage.style.display = 'block';
            }
        });
    });
</script>