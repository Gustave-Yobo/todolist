{{--@extends('layouts.base')

<title>Creation d'une tâche</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Création d'une tâche</div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error )
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{route('dashboard.store')}}" method="post">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" placeholder="Titre de la tâche" value="{{ old('titre') }}">
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Détail</label>
                            <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" placeholder="Détail de la tâche">{{ old('detail') }}</textarea>
                            @error('detail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Selectionner un utilisateur</label>
                            <select class="form-control" name="users_id">
                                @foreach($users as $user)
                                    <option value="{{$user->users_id}}">{{$user->nom}}</option>
                                @endforeach
                            </select>
                            @error('users_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<p><a href="/dashboard">Revenir à la page d'acceuil</a></p>
@endsection--}}

<title>Nouvelle tâche</title>
<x-app-layout>
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
                    <label for="users_id">Selectionner un utilisateur</label>
                    <select class="form-control" id="users_id" name="users_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" >{{ $user->nom }}</option>
                        @endforeach
                    </select>
                    {{--<input type="text" class="form-control @error('users_id') is-invalid @enderror" id="users_id" name="users_id" placeholder="Utilisateur" value="{{ old('users_id') }}">--}}
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
<footer>
    <p>&copy; Copyright {{date('Y')}} &middot;</p>
</footer>
</x-app-layout>
