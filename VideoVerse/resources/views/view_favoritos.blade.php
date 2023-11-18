<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
<h1 style="color: white; margin-left: 260px; margin-top: 50px;" class="title">Seus videos curtidos:</h1>
    <div class="content">
        <div class="video-grid">
            @foreach ($videosFavoritos as $video)
                @if ($video->estado_video == 'publico')
                <div class="video">
                    @foreach ($favoritos as $favorito)
                        @if ($favorito->video_id == $video->id)
                            <p class="video-info">Curtido em {{ \Carbon\Carbon::parse($favorito->created_at)->format('d/m/Y') }}</p>
                        @endif
                    @endforeach
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail">
                        <h2 class="video-title">{{ $video->titulo }}</h2>
                        <p class="video-info">{{ $video->canal->nome }}</p>
                        <p class="video-info">Publicado {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }} - {{ $video->visualizacao }} visualizações</p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</body>
@endsection

