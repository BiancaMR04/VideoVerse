<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Canal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/meu_canal.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
    
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

    <div class="perfil">
    @isset($canal)
            <div class="cover-photo" style="background-image: url('/uploads/{{ $canal->imagem_fundo }}');">
                <div class="btn">
                    <button class="editar-canal-button">
                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Edit-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0VkaXQtaWNvbi5wbmciLCJpYXQiOjE2OTU1MDE0MzUsImV4cCI6MTcyNzAzNzQzNX0.1E7_R6qzxJqlOdv2z0bmPoKpn19r8SlcFtPEguPrJEo&t=2023-09-23T20%3A37%3A15.323Z" width="26" height="26"></img>
                </button>
                <button class="editar-canal-button">
                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Upload-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1VwbG9hZC1pY29uLnBuZyIsImlhdCI6MTY5NTUwMTcxOSwiZXhwIjoxNzI3MDM3NzE5fQ.rsMTONXa74m3fJs6pSCoLqE0vLxsk5PCX5QCZT-kQvE&t=2023-09-23T20%3A42%3A00.023Z" width="26" height="26"></img>
                </button>
                </div>
                <div class="gray-background"></div>
                <!-- Foto de Perfil Redonda -->
                <div class="profile-photo" style="background-image: url('/uploads/{{ $canal->imagem_perfil }}');"></div>
            </div>
            <div class="nome-do-canal">
                <h1>{{ $canal->nome }}</h1>
                <h1 style="font-size: 16px; color: grey; margin-top: -10px;">{{ $canal->inscritos }} Inscritos</h1>
            </div>
            <div class="channel-info">
                <p>{{ $canal->descricao }}</p>
            </div>
            <h1 class="title" style="margin-top: 40px; margin-left: 300px; font-size: 24px;">Vídeos</h1>
            <div class="video-grid">
                @foreach ($videos as $video)
                    <div class="video">
                        <a href="{{ route('video.show', ['id' => $video->id]) }}">
                            <img src="{{ $video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="video-thumbnail">
                            <h2 class="video-title">{{ $video->titulo }}</h2>
                            <p class="video-info">{{ $video->canal->nome }}</p>
                            <p class="video-info">{{ $video->visualizacao }} visualizações</p>
                            <p class="video-info">{{ $video->data }}</p>
                        </a>
                    </div>
                    <div class="dropdown">
                        <button class="button-excluir dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                <path d="M140,128a12,12,0,1,1-12-12A12,12,0,0,1,140,128ZM128,72a12,12,0,1,0-12-12A12,12,0,0,0,128,72Zm0,112a12,12,0,1,0,12,12A12,12,0,0,0,128,184Z"></path>
                            </svg>
                        </button>
                            <div class="dropdown-menu">
                                <form method="POST" action="{{ route('excluir.video', ['videoId' => $video->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item">
                                    Excluir
                                    </button>
                                </form>
                                <button class="dropdown-item" >
                                   Privacidade
                                </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Se o canal não existir (usuário não logado ou canal não criado), você pode exibir uma mensagem ou redirecionar para a página de criação do canal -->
            <h1 class="title">Canal não encontrado</h1>
        @endif
</body>
<script src="meu_canal.js"></script>
@endsection
