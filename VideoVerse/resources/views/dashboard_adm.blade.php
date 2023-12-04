<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: linear-gradient(144deg, #160F2E, #2A163A 50%, #411C48);">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
    <div class="content">
        <div class="video-grid">
            @foreach ($publicVideos as $video)
                @if ($video->estado_video == 'publico')
                <div class="video">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail">
                        <h2 class="video-title">{{ $video->titulo }}</h2>
                        <p class="video-info">{{ $video->canal->nome }}</p>
                        <p class="video-info">{{ $video->visualizacao }} visualizações - 
                            há {{ \Carbon\Carbon::parse($video->data)->diffInDays(\Carbon\Carbon::now()) }} dias</p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</body>
@endsection

