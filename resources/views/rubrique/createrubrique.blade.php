<title>Nouvelle rubrique</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Création d'une rubrique
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
                  <x-jet-label value="Nom" />
                  <x-jet-input class="block mt-1 w-full" type="text" id=nom name="nom" :value="old('nom')" placeholder="Nom de la rubrique" required autofocus />
                </div>

                <div class="form-group">
                    <label for="tache_id">Selectionner une tâche</label>
                    <select class="form-control" id="tache_id" name="tache_id">
                        @foreach($taches as $tache)
                            <option value="{{ $tache->id }}" >{{ $tache->titre }}</option>
                        @endforeach
                    </select>
                    {{--<input type="text" class="form-control @error('users_id') is-invalid @enderror" id="users_id" name="users_id" placeholder="Utilisateur" value="{{ old('users_id') }}">--}}
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
<footer>
    <p>&copy; Copyright {{date('Y')}} &middot;</p>
</footer>
</x-app-layout>
