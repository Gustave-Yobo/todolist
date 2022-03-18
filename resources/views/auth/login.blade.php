<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Todolist</title>
</head>
<body>
    {{-- <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Souvenir de') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Connexion') }}
                    </x-jet-button>
                </div>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Vous n\'avez pas de compte ? Inscrivez-vous ici') }}
                </a>
            </form>
        </x-jet-authentication-card>
    </x-guest-layout> --}}

    <div class="wrapper">
        @if(isset ($errors) && count($errors) > 0)
            <div class="alert alert-warning" role="alert">
                <ul class="list-unstyled mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $msg }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                </div>
            @endif
        @endif
        <div class="logo"> <img src="image/todo.png" alt="Todolist"> </div>
        <div class="text-center mt-4 name"> TODOLIST </div>
        <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email" required="required" autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class="form-control" name="password" id="pwd" value="{{old('password')}}" placeholder="Mot de passe" required="required">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="btn mt-3">Connexion</button>
        </form>
        <div class="text-center fs-6"> <a href="{{ route('password.request') }}">Mot de passe oublié ?</a> ou <a href="{{ route('register') }}">S'inscrire</a> </div>
    </div>

</body>
</html>
