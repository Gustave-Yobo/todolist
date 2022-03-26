<title>Recherche</title>
@extends('FrontEnd.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Formulaire</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item">Recherche</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
              <div class="col-lg-6">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Résultat de la recherche </h5>
                    @if($taches->isNotEmpty())
                        @foreach ($taches as $tache)
                            <div class="px-4 py-3">
                                <p><a href="{{ route('dashboard.taches.show', ['id' => $tache->id ])}}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ $tache->titre}}</a></p>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <h2>Pas de tâche trouvé</h2>
                        </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </section>
    </main>
@endsection
