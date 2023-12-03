<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<style>

        .opções.admin {
            text-align: left;
            color: white;
            margin-left: 200px;
        }

        .icons {
            margin-left: 250px;
        }

        .icons a {
            display: block;
            margin-bottom: 10px;
            color: white;
        }

        .user-grid {
            margin-left: 450px;
            display: none; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;  
            height: 100vh;
        }

        .adm-button {
            padding: 0.2em;
            border-radius: 5px;
            width: 105px;
            height: 38px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #1a1818;
            color: white;
            margin-top: -68px; 
            margin-left: 900px;
        }

        .adm-button:hover {
            border: #B42DF4 solid .5px;
        }

        .gerenciar-button{
            padding: 0.2em;
            margin-top: 0px;
            border-radius: 5px;
            width: 100px;
            height: 40px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #1a1818;
            color: white;
        }

        .item-lista {
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            width: 1100px;
            transition: .2s ease-in-out;
            border-radius: 5px;
            border: #1a1818 solid .5px;
        }

        .item-lista:hover{
            border: #B42DF4 solid .5px;
        }

        .item-lista:hover .gerenciar-button{
            background-color: #B42DF4;
        }

        .video-lista {
            margin-left: 450px;
            display: none; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;  
            height: 100vh;
        }

        .thumbnail {
            width: 150px;
            height: auto;
            border-radius: 10%;
        }

        .item-lista-video{
            width: 1100px;
            height: 87px;
            margin-top: 20px;
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            transition: .2s ease-in-out;
            border-radius: 10px;
            border: #1a1818 solid .5px;
        }

        .item-lista-video:hover{
            border: #B42DF4 solid .5px;
        }

        .item-lista-video:hover .gerenciar-button{
            background-color: #B42DF4;
        }

        .item-lista-video a {
           text-decoration: none; 
        }

        .item-lista-video a:hover {
            text-decoration: none;
        }

        .information_video {
            display: flex;
            align-items: center;
            gap: 20px; 
            margin-bottom: 0px; 
            align-self: center; 
        }

        .info {
            color: #fff;
            text-decoration: none;
            margin-top: 2px;
            margin-bottom: 2px;
        }

        .canais-lista {
            margin-left: 450px;
            display: none; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;  
            height: 100vh;
        }

        .item-lista-canal {
            width: 1100px;
            height: 90px;
            margin-top: 20px;
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            transition: .2s ease-in-out;
            border-radius: 10px;
            border-bottom-left-radius: 50px;
            border-top-left-radius: 50px;
            border: #1a1818 solid .5px;
        }

        .item-lista-canal:hover{
            border: #B42DF4 solid .5px;
        }

        .item-lista-canal:hover .gerenciar-button{
            background-color: #B42DF4;
        }

        .item-lista-canal a {
            text-decoration: none; 
        }

        .item-lista-canal a:hover {
            text-decoration: none;
        }

        .information_canal {
            display: flex;
            align-items: center;
            gap: 20px; 
            margin-bottom: 0px; 
            align-self: center; 
        }

        .foto-canal-image {
            width: 90px;
            height: 90px;
            border-radius: 50%;
        }

    </style>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
<div class="content">
    @if (Auth::user()->adm)
    <h1 style="color: white; margin-left: 250px; margin-top: 20px;">Bem-vindo, <span style="color: #b42df4;">{{ Auth::user()->name }}</span></h1>
    <h2 style="color: white; margin-left: 250px; margin-top: 20px;">O que você deseja fazer?</h2>   
    <div class="icons">
        <a href="javascript:void(0);" onclick="toggleListaUsuarios()"><i class="fas fa-users"></i>__Listar Usuários</a>
        <a href="javascript:void(0);" onclick="toggleListaCanais()"><i class="fas fa-list"></i>__Listar Canais</a>
        <a href="javascript:void(0);" onclick="toggleListaVideos()"><i class="fas fa-film"></i>__Listar Vídeos</a>
        <a href="#"><i class="fas fa-exclamation-triangle"></i>__Listar Reports</a>
    </div>

    <!-- Lista de usuários inicialmente oculta -->
    <div class="user-grid">
    <h1 style="color: white; margin-left: 350px;">Lista de Usuários</h1>
        @foreach($users as $user)
            @if ($user->id != Auth::user()->id)
                <form method="POST" action="{{ route('excluir.usuario', ['id' => $user->id]) }}">
                    @csrf
                    <div class="item-lista">
                        <p style="margin-left: 5px; margin-top: 8px; margin-bottom: 8px;">{{ $user->name }}</p>
                        @method('DELETE')
                        <button class="gerenciar-button" type="submit">Excluir</button>
                    </div>
                </form>

                @if (!$user->adm)
                    <form method="POST" action="{{ route('tornar.adm', ['id' => $user->id]) }}">
                        @csrf
                        <button class="adm-button" type="submit">Tornar Adm</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('remover.adm', ['id' => $user->id]) }}">
                        @csrf
                        <button class="adm-button" type="submit">Remover Adm</button>
                    </form>
                @endif
            @endif
        @endforeach
    </div>

    <!-- Lista de videos inicialmente oculta -->
    <div class="video-lista">
        <h1 style="color: white; margin-left: 350px;">Lista de Vídeos</h1>
            @foreach ($videos as $video)
            <form method="POST" action="{{ route('excluir.video', ['id' => $video->id]) }}">
                @csrf
                <div class="item-lista-video">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}" class="information_video">
                        <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="thumbnail">
                        <div class="info">
                            <h2 style="font-size: 20px; margin-top: 20px;">{{ $video->titulo }}</h2>
                            <p style="margin-bottom: 0px;">{{ $video->canal->nome }}</p>
                            <p style="color: grey; margin-bottom: 20px;">{{ $video->visualizacao }} visualizações - {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }}</p>
                        </div>
                    </a>
                    @method('DELETE')
                    <button type="submit" style="height: 100%;" class="gerenciar-button">Excluir</button>
                </div>
            </form>
        @endforeach
    </div>

    <div class="canais-lista">
        <h1 style="color: white; margin-left: 350px;">Lista de Canais</h1>
        @foreach ($canais as $canal)
        <form method="POST" action="{{ route('excluir.video', ['id' => $video->id]) }}">
            @csrf
            <div class="item-lista-canal">
                <a href="/canal/{{ $canal->id }}" class="information_canal">
                    <img src="{{ asset('uploads/' . $canal->imagem_perfil) }}" class="foto-canal-image">
                    <div class="info">
                        <h3 style="font-size: 20px; margin-top: 20px;">{{ $canal->nome }}</h3>
                        <p style="color: grey; margin-bottom: 20px;">{{ $canal->inscritos }} inscritos</p>
                    </div>
                </a>
                @method('DELETE')
                <button type="submit" style="height: 100%;" class="gerenciar-button">Excluir</button>
            </div>
        </form>
        @endforeach
    </div>

    @else
    <h1 style="color: white; margin-left: 250px; margin-top: 20px;">Você não tem permissão para acessar essa página</h1>
    @endif
</div>

<script>
    function toggleListaUsuarios() {
        var listaUsuarios = document.querySelector('.user-grid');
        listaUsuarios.style.display = (listaUsuarios.style.display === 'none' || listaUsuarios.style.display === '') ? 'block' : 'none';
        document.querySelector('.video-lista').style.display = 'none';
        document.querySelector('.canais-lista').style.display = 'none';
    }
</script>
<script>
    function toggleListaVideos() {
        var listaVideos = document.querySelector('.video-lista');
        listaVideos.style.display = (listaVideos.style.display === 'none' || listaVideos.style.display === '') ? 'block' : 'none';
        document.querySelector('.user-grid').style.display = 'none';
        document.querySelector('.canais-lista').style.display = 'none';
    }
</script>
<script>
    function toggleListaCanais() {
        var ListaCanais = document.querySelector('.canais-lista');
        ListaCanais.style.display = (ListaCanais.style.display === 'none' || ListaCanais.style.display === '') ? 'block' : 'none';
        document.querySelector('.user-grid').style.display = 'none';
        document.querySelector('.video-lista').style.display = 'none';
    }
</script>

</body>
@endsection