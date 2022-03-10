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
        <h1>Liste des tâches</h1>
        @if ($taches->count() > 0)
            @foreach ($taches as $tache )
                <h3><a href="{{ route('dashboard.taches.show', ['id' => $tache->id ])}}">{{ $tache->titre}}</a></h3>
            @endforeach
        @else
            <span>Aucune tâche en base de données.</span>
        @endif
        <p>
            <a href="{{ route('dashboard.create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ajouter une nouvelle tâche</a>
        </p>
    </div>

    <footer>
        <p>&copy; Copyright {{date('Y')}} &middot; <a href="/dashboard/about">A propos</a></p>
    </footer>
</x-app-layout>
