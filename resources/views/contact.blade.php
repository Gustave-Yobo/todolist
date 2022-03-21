<title>Contact</title>
@extends('FrontEnd.index')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
          <li class="breadcrumb-item active">Contactez-nous</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Adresse</h3>
                <p>Douala,<br>Tradex Village</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Appelez-nous</h3>
                <p>+237 698-62-33-41<br>+237 657-90-73-62</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email</h3>
                <p>gustaveyoboyann@gmail.com</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4">
            @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3">
                {{ session('message') }}
            </div>
         @endif
            <form action="{{ route('contact.store') }}" method="post" class="php-email-form">
                @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre Nom" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Votre Email" required>
                </div>


                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Charger</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Envoyer Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->
@endsection


    {{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contactez-nous
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
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="mt-4">
                  <x-jet-label value="Nom" />
                  <x-jet-input class="block mt-1 w-full" type="text" id=nom name="nom" :value="old('nom')" placeholder="Votre nom" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" id=nom name="email" :value="old('email')" placeholder="Votre Email" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label value="Message" />
                    <textarea class="form-input rounded-md shadow-sm mt-1" style="width: 100%" id="message" name="message" placeholder="Votre message">{{ old('message') }}</textarea>
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
