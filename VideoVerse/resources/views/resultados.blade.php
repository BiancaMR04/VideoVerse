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

<div class="sidebar">
    <a href="/home">
        <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Video.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1ZpZGVvLnBuZyIsImlhdCI6MTY5NTIzNzE5MiwiZXhwIjoxNzI2NzczMTkyfQ.eNEc9UbyE-R8FvUIEFluv1idyFtPoZb0dAxgoVPy9zs&t=2023-09-20T19%3A13%3A12.647Z" alt="Logo" class="image">
    </a>
    <div class="icon-container" style="margin-top: 130px;">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Inicio-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0luaWNpby1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzU2MiwiZXhwIjoxNzI2NzczNTYyfQ.rDxkg7fLVzZRWYgxYmCOKjkCJ5ol1nkP9gTlaoQXZ5M&t=2023-09-20T19%3A19%3A22.417Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Início</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Canais-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0NhbmFpcy1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzYwOCwiZXhwIjoxNzI2NzczNjA4fQ.pQRUxTFk3tLDGK1zH_dewsL3Wy__qw1-dXFeEldTyIw&t=2023-09-20T19%3A20%3A08.090Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Canais</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Musica-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL011c2ljYS1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzYyMywiZXhwIjoxNzI2NzczNjIzfQ.D49Dn-Mb833xfTjc0CImFzq2NelHfuYfb99iryODTMg&t=2023-09-20T19%3A20%3A23.141Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Música</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Podcasts-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvZGNhc3RzLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3NzA5LCJleHAiOjE3MjY3NzM3MDl9.z4tWErm2AAq-c2kGULfJc-QPzRFvOjcjPUPeK3Y6Cqo&t=2023-09-20T19%3A21%3A48.953Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Pocasts</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Educacao-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0VkdWNhY2FvLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3NzUwLCJleHAiOjE3MjY3NzM3NTB9.ToZV4BTgSarS5ap98-ID-NW35s4vJerVHZ8f7UmVPb0&t=2023-09-20T19%3A22%3A30.629Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Educação</span>
    </div>
    <div class="icon-container" style="margin-top: 100px;">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Inscricoes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0luc2NyaWNvZXMtaWNvbi5wbmciLCJpYXQiOjE2OTUyMzc3NjMsImV4cCI6MTcyNjc3Mzc2M30.2Mj711PqmgtBIDKLkE004YnjmOMlT0rvK368xFy8-2Q&t=2023-09-20T19%3A22%3A43.840Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Incrições</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Favoritos-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0Zhdm9yaXRvcy1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzY1MiwiZXhwIjoxNzI2NzczNjUyfQ.JQiGVfxanfkyTPed15itPQwkd7jXMdUvF6ZqzAIRmLw&t=2023-09-20T19%3A20%3A52.676Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Favoritos</span>
    </div>
    <div class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Recentes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1JlY2VudGVzLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3Njc0LCJleHAiOjE3MjY3NzM2NzR9.FcgJNEpiwat-yW8m1dBnZLQOMho0V53GDW3qOCi_iDM&t=2023-09-20T19%3A21%3A15.774Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Recentes</span>
    </div>
    <div class="icon-container" style="margin-top: 130px;">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Ajustes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0FqdXN0ZXMtaWNvbi5wbmciLCJpYXQiOjE2OTUyMzc3ODcsImV4cCI6MTcyNjc3Mzc4N30.-Ug28aVXnKF_LM1FrRBKps5tAAFoqYZ359OdKBvcLT4&t=2023-09-20T19%3A23%3A08.010Z" width="32" height="28" style="width: 36px;height: 36px;">
        </div>
        <span class="icon-label">Configurações</span>
    </div>
    <a href="/login" class="icon-container">
        <div class="icon">
            <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Sair-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1NhaXItaWNvbi5wbmciLCJpYXQiOjE2OTUyNDYxMDksImV4cCI6MTcyNjc4MjEwOX0.jPXbmqw3cRts6dJxL5ZXqYYesIB0tNZc9KzlZtwB1k8&t=2023-09-20T21%3A41%3A50.112Z" width="32" height="28" style="width: 33px;height: 33px; margin-left: 3px;">
        </div>
        <span class="icon-label">Sair</span>
    </a>
</div>

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