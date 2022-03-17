<title>Contact</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contactez-nous
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />
            @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3">
              {{ session('message') }}
            </div>
             @endif
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="mt-4">
                  <x-jet-label value="Nom" />
                  <x-jet-input class="block mt-1 w-full" type="text" id=nom name="nom" :value="old('nom')" placeholder="Votre nom" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" id=nom name="email" :value="old('email')" placeholder="Votre Email" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label value="Message" />
                    <textarea class="form-input rounded-md shadow-sm mt-1" style="width: 100%" id="message" name="message" placeholder="Votre message">{{ old('message') }}</textarea>
                  </div>

                <div class="flex items-center justify-end mt-4">
                  <x-jet-button class="ml-4">
                      Envoyer
                  </x-jet-button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Todolist</span></strong>. Tous Droits Reservés
    </div>
    <div class="credits">
      Par <a href="#">Gustave Yobo</a>
    </div>
  </footer><!-- End Footer -->
</x-app-layout>
