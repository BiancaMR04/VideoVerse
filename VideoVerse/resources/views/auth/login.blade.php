@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>
<body style="color: rgb(43,48,52); background: #1A1818;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card @if ($errors->any()) has-error @endif">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="campo">
                            <label for="email" class="field">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="campo">
                            <label for="password" class="field">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="campo">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembre-se de mim') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="button">Login</button>
                            </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: white;">
                                        {{ __('Esqueci minha senha') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Polygon1.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvbHlnb24xLnBuZyIsImlhdCI6MTY5NTIzNzM0NiwiZXhwIjoxNzI2NzczMzQ2fQ.iEm9n0CxhCo5XZMxVVLO82oW9eTrNzyExYu4jMgucZQ&t=2023-09-20T19%3A15%3A46.147Z" alt="Triângulo" class="triangle-image">
<img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Polygon2.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvbHlnb24yLnBuZyIsImlhdCI6MTY5NTIzNzM5MCwiZXhwIjoxNzI2NzczMzkwfQ.bPyOQtPZclreS8rB54xgi16u0UJbU3cuglOJSFiTols&t=2023-09-20T19%3A16%3A30.076Z" alt="Triângulo" class="triangle-image2">

</body>
@endsection
