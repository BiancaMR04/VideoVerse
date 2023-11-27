<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pesquisa.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">

@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

    <h1 style="margin-left: 20rem; color:white;">Lista de Vídeos</h1>

    @foreach($videos as $video)
        <div class="video" style="margin-left: 20rem; display:grid">
                        <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail" >
                        <h2 class="video-title">{{ $video->titulo }}</h2>
                        <p class="video-info">{{ $video->canal->nome }}</p>
                        <p class="video-info">{{ $video->visualizacao }} visualizações - 
                            há {{ \Carbon\Carbon::parse($video->data)->diffInDays(\Carbon\Carbon::now()) }} dias</p>
                            <form method="POST" action="{{ route('excluir.video', ['id' => $video->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-excluir">Excluir</button>
            </form>
        </div>
    @endforeach
</body>
@endsection


