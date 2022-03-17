<title>Tache</title>
<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Fiche d'une tâche
                <a href="{{ route('dashboard.edit', ['id' => $tache->id ]) }}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded float-right">Modifier</a>
            </h2>
            <br>
            <div class="flex items-center justify-end mt-4">
                <form id="destroy{{ $tache->id }}" action="{{ route('dashboard.destroy', ['id' => $tache->id ]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded float-right"
                      onclick="event.preventDefault('Are you sure');
                      this.closest('form').submit();">
                      Supprimer
                    </a>
                </form>
        </div>
        </x-slot>

        <div class="py-12">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="text-2xl">Titre</p>
                    <p>{{ $tache->titre }}</p>
                    <p class="text-2xl">Détail</p>
                    <p>{{ $tache->detail }}</p>
                    <p class="text-2xl">Utilisateur assigné</p>
                    <p>{{ \App\Models\User::find($tache->users_id)->nom }}</p>
                    {{-- <p>{{ $tache->users_id }}</p> --}}
                    <p class="text-2xl">Status</p>
                    <p>{{ \App\Models\Statu::find($tache->status_id)->nom }}</p>
                    <p class="text-2xl">Date de création</p>
                    <p>{{ $tache->created_at->format('d/m/Y') }}</p>
                    @if($tache->created_at != $tache->updated_at)
                        <p class="text-2xl">Dernière mise à jour</p>
                        <p>{{ $tache->updated_at->format('d/m/Y') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





