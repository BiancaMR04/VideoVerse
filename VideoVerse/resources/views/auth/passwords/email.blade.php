@extends('layouts.app')

@section('content')

<style>
    *{
        background-color: #1A1818;
        color:white;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/recuperarsenha.css') }}">
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #1A1818">
                <div class="card-header" style="color:white">{{ __('Recuperar senha') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#252525; border:none;">
                                    {{ __('Enviar e-mail para recuperar senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
