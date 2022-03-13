<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    {{--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>--}}

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des tâches
                <a href="{{ route('dashboard.create') }}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded float-right">Créer une tâche</a>
                <a href="{{ route('rubrique.create') }}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded float-right">Créer une rubrique</a>
                {{--<a href="{{ route('dashboard.create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ajouter une nouvelle tâche</a>--}}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 w-1/4">Titre</th>
                                <th class="px-4 py-2 w-1/4">Rubrique</th>
                                {{--<th class="px-4 py-2 w-1/6"></th>
                                <th class="px-4 py-2 w-1/6"></th>
                                <th class="px-4 py-2 w-1/6"></th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($taches->count() > 0)
                                @foreach ($taches as $tache )
                                    <tr>
                                        {{--<td class="px-4 py-3">{{ $tache->titre }}</td>--}}
                                        <td class="px-4 py-3"><a href="{{ route('dashboard.taches.show', ['id' => $tache->id ])}}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ $tache->titre}}</a></td>
                                        <td class="px-4 py-3">{{ \App\Models\Statu::find($tache->status_id)->nom }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <span>Aucune tâche en base de données.</span>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; Copyright {{date('Y')}} &middot; <a href="/dashboard/about">A propos</a></p>
    </footer>
</x-app-layout>
