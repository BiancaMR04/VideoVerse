<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pesquisa.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
    <style>
        .content {
            margin-left: 250px; /* Ajuste conforme a largura do seu menu lateral */
            padding: 20px; /* Adicione algum preenchimento para afastar o conteúdo das bordas */
        }
    </style>
</head>
<body style="background: #1A1818;">

@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

<div class="content">
    <h1 style="color: white; margin-bottom: 35px;">Resultados para pesquisa "{{ $query }}"</h1>
    @if ($canais->isEmpty() && $videos->isEmpty())
        <p style="color: white; font-size: 20px">Nenhum resultado encontrado.</p>
    @else
        <!-- Exibição de canal -->
        <div class="content-pesquisa">
            @foreach ($canais as $canal)
            <div class="cada-canal">
                <a href="/canal/{{ $canal->id }}" class="information_canal">
                    <img src="{{ asset('uploads/' . $canal->imagem_perfil) }}" class="profile-image-pesquisa">
                    <div class="info">
                        <h3>{{ $canal->nome }}</h3>
                        <p>{{ $canal->inscritos }} inscritos</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Seção de Vídeos -->
        <div class="content-pesquisa">
            @foreach ($videos as $video)
            <div class="cada-video">
                <a href="{{ route('video.show', ['id' => $video->id]) }}" class="information_video">
                    <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail">
                    <div class="info">
                        <h2 class="video-title">{{ $video->titulo }}</h2>
                        <div class="channel-info">
                            <img src="{{ $video->canal->imagem_perfil }}" class="canal-thumbnail">
                            <p>{{ $video->canal->nome }}</p>
                        </div>
                        <p style="color: grey">{{ $video->visualizacao }} visualizações</p>
                        <p style="color: grey">Publicado {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }}</p>
                    </div>
                </a>
            </div>
            @endforeach 
        </div>
    @endif
</div>
</body>
@endsection
</html>
