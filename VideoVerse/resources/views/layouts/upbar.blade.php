<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VideoVerse') }}</title>

    <!-- Fonts -->
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .btn {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .button {
        margin-right: 5px;
        padding: 0.5em;
        padding-left: 2em;
        padding-right: 2em;
        margin-top: -10px;
        border-radius: 5px;
        width: 140px;
        height: 40px;
        border: none;
        outline: none;
        transition: .4s ease-in-out;
        background-color: #252525;
        color: white;
        text-decoration: none;
    }

    .button:hover {
        background-color: #B42DF4;
        color: white;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-purple shadow-sm">

        <div class="col-xl-8">
            <i class="fas fa-search search-icon" style="margin-top: -3px;"></i>
            <input type="text" id="caixaDePesquisa" class="caixadebusca" placeholder=" Pesquisar..." autocomplete="on" style="font-family: 'Questrial', sans-serif; font-size: 16px; border-radius: 10.166px;border: 1.017px solid rgba(255, 255, 255, 0.10);background: #323232;width: 550px;color: rgb(255,255,255);height: 26px;margin-left: 710px;margin-top: 10px;">
        </div>

            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <div class="btn">
                                <a href="/login" class="button" >Entrar</a>
                                <a href="/register" class="button" >Cadastre-se</a>
                            </div>

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if($temCanal)
                                    <a class="dropdown-item" href="{{ route('meu-canal') }}">
                                        {{ __('Meu Canal') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('monetizacao') }}">
                                        {{ __('Monetização') }}
                                    </a>  
                                    <a class="dropdown-item" href="{{ route('video.uploadForm') }}">
                                        {{ __('Upload de Vídeo') }}
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('cadastro-canal') }}">
                                        {{ __('Criar Canal') }}
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
