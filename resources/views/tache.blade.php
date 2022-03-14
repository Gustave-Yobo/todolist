<title>Tache</title>
<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Fiche d'une tâche
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="text-2xl">Titre</p>
                    <p>{{ $tache->titre }}</p>
                    <p class="text-2xl">Détail</p>
                    <p>{{ $tache->detail }}</p>
                    <p class="text-2xl">Utilisateur assigné</p>
                    <p>{{ $tache->users_id }}</p>
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

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            <a href="{{ route('dashboard.edit', ['id' => $tache->id ]) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Modifier</a>
        </x-jet-button>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            <form id="destroy{{ $tache->id }}" action="{{ route('dashboard.destroy', ['id' => $tache->id ]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a class="text-sm text-gray-700 dark:text-gray-500 underline"
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                  Supprimer
                </a>
            </form>
        </x-jet-button>
    </div>

    <footer>
        <p>&copy; Copyright {{date('Y')}} &middot;</p>
    </footer>
</x-app-layout>





