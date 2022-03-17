<title>Formulaire</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Création d'une tâche
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
            <form method="POST" action="{{ route('dashboard.store') }}">
                @csrf

                <div class="mt-4">
                  <x-jet-label value="Titre" />
                  <x-jet-input class="block mt-1 w-full" type="text" id=titre name="titre" :value="old('titre')" placeholder="Titre de la tâche" required autofocus />
                </div>

                <div class="mt-4">
                  <x-jet-label value="Détail" />
                  <textarea class="form-input rounded-md shadow-sm mt-1" style="width: 100%" id="detail" name="detail" placeholder="Détail de la tâche">{{ old('detail') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="users_id">Assigner à un utilisateur</label>
                    <select class="form-control" id="users_id" name="users_id">
                        <option selected>Selectionner un utilisateur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" >{{ $user->nom }}</option>
                        @endforeach
                    </select>
                    @error('users_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
