@extends('layouts.base')

<title>{{$tache->titre}}</title>
@section('content')
    <h1>{{ $tache->detail }}</h1>

    {{--<hr>
    @foreach ($user->taches as $tache )
        <div>{{ $tache}}</div>
    @endforeach--}}
    <p><a href="/dashboard">Revenir à la page d'acceuil</a></p>
@endsection
