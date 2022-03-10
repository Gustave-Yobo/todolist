@extends('layouts.base')


<title>Menu</title>
@section('content')
<h1>Liste des tâches</h1>
    @if ($taches->count() > 0)
        @foreach ($taches as $tache )
            <h3><a href="{{ route('index.taches.show', ['id' => $tache->id ])}}">{{ $tache->titre}}</a></h3>
        @endforeach
    @else
        <span>Aucune tâche en base de données.</span>
    @endif
    <p>
        <a href="{{ route('index.create')}}">Ajouter une nouvelle tâche</a>
    </p>
@endsection
