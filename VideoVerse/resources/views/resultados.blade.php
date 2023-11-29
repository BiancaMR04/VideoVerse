<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
<!-- Exibição de vídeos -->
    <h1 style="color: white">Resultados da Pesquisa para "{{ $query }}"</h1>
<!-- Exibição de canal -->
<div class="content">

    @forelse ($canais as $canal)
    <a href="/canal/{{ $canal->id }}" class="information_canal">
        <img src="{{ asset('uploads/' . $canal->imagem_perfil) }}" class="profile-image">
        <div class="info">
            <h3>{{ $canal->nome }}</h3>
            <p>{{ $canal->descricao }}</p>
            <p>{{ $canal->inscritos }} inscritos</p>
        </div>
    </a>
    @empty
        <p style="color:white; font-size:25px ">Nenhum canal encontrado.</p>
    @endforelse

    <!-- Seção de Vídeos -->
    <div>
    @forelse ($videos as $video)
    <a href="{{ route('video.show', ['id' => $video->id]) }}" class="information_video">
        <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail">
        <div class="info">
            <h2>{{ $video->titulo }}</h2>
            <p>{{ $video->canal->nome }}</p>
            <p>{{ $video->visualizacao }} visualizações</p>
            <p>{{ $video->data }}</p>
        </div>
    </a>
    @empty
        <p style="color:white; font-size:25px">Nenhum vídeo encontrado.</p>
    @endforelse
</div>
</body>
@endsection
</html>
