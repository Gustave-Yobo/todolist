@extends('FrontEnd.index')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Accueil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-10 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title"> <i class="bi bi-cart"></i>   Liste des tâches </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    </div>
                                    <div class="ps-3">
                                        <table class="table-fixed">
                                            <thead>
                                                <tr>
                                                    <th class="px-4 py-2 w-1/4">Titre</th>
                                                    {{-- <th class="px-4 py-2 w-1/4">Utilisateur assigné</th> --}}
                                                    <th class="px-4 py-2 w-1/4">Rubrique</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($taches->count() > 0)
                                                    @foreach ($taches as $tache )
                                                        <tr>
                                                            <td class="px-4 py-3"><a href="{{ route('dashboard.taches.show', ['id' => $tache->id ])}}" role="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ $tache->titre}}</a></td>
                                                            {{-- <td class="px-4 py-3">{{ \App\Models\User::find($tache->users_id)->nom }}</td> --}}
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
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>
</main><!-- End #main -->
@endsection
