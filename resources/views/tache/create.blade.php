<title>Formulaire</title>
@extends('FrontEnd.index')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulaire</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
          <li class="breadcrumb-item">Formulaire de tâche</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Création d'une tâche</h5>

              <!-- General Form Elements -->
              @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3">
              {{ session('message') }}
            </div>
             @endif
              <form method="POST" action="{{ route('dashboard.store') }}">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Titre de la tâche</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id=titre name="titre" :value="old('titre')" required autofocus />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Détail de la tâche</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" id="detail" name="detail">{{ old('detail') }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="users_id">Assigner à un utilisateur</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="users_id" name="users_id">
                      <option selected>Selectionner un utilisateur</option>
                      @foreach($users as $user)
                      <option value="{{ $user->id }}" >{{ $user->nom }}</option>
                  @endforeach
              </select>
              @error('users_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Création d'une tâche
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />
            @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3">
              {{ session('message') }}
            </div>
             @endif
            <form method="POST" action="{{ route('dashboard.store') }}">
                @csrf

                <div class="mt-4">
                  <x-jet-label value="Titre" />
                  <x-jet-input class="block mt-1 w-full" type="text" id=titre name="titre" :value="old('titre')" placeholder="Titre de la tâche" required autofocus />
                </div>

                <div class="mt-4">
                  <x-jet-label value="Détail" />
                  <textarea class="form-input rounded-md shadow-sm mt-1" style="width: 100%" id="detail" name="detail" placeholder="Détail de la tâche">{{ old('detail') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="users_id">Assigner à un utilisateur</label>
                    <select class="form-control" id="users_id" name="users_id">
                        <option selected>Selectionner un utilisateur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" >{{ $user->nom }}</option>
                        @endforeach
                    </select>
                    @error('users_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                  <x-jet-button class="ml-4">
                      Envoyer
                  </x-jet-button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Todolist</span></strong>. Tous Droits Reservés
    </div>
    <div class="credits">
      Par <a href="#">Gustave Yobo</a>
    </div>
  </footer><!-- End Footer -->
</x-app-layout> --}}
