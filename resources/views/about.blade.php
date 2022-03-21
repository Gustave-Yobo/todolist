<title>A propos</title>
@extends('FrontEnd.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>A propos</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item">A propos de nous</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
              <div class="col-lg-6">
                {{-- <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Création d'un status de la tâche</h5>
                  </div> --}}
                </div>
              </div>
            </div>
          </section>
    </main>
@endsection
