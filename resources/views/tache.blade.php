<title>{{$tache->titre}}</title>
<x-app-layout>
    <div>
        <h1>{{ $tache->detail }}</h1>
        {{--<hr>
    @foreach ($user->taches as $tache )
        <div>{{ $tache}}</div>
    @endforeach--}}
    </div>

    <footer>
        <p>&copy; Copyright {{date('Y')}} &middot;</p>
    </footer>
</x-app-layout>





