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
        <h1 class="title">{{ $canal->nome }}</h1>
            <div class="cover-photo" style="background-image: url('/uploads/{{ $canal->imagem_fundo }}');">
                <div class="btn">
                    @csrf
                    @guest
                        <button id="inscrever-se-btn-deslogado" type="button" onclick="redirecionarParaLogin()" class="inscrever-se-btn">
                            Inscrever-se
                        </button>
                    @else
                        <button id="inscrever-se-btn" type="submit" class="inscrever-se-btn @if(auth()->user() && auth()->user()->subscribedChannels->contains($canal->id)) inscrito @endif">
                        @if(auth()->user() && auth()->user()->subscribedChannels->contains($canal->id))
                            Inscrito
                        @else
                            Inscrever-se
                        @endif
                        </button>
                    @endif
                    <input type="hidden" name="canal_id" value="{{ $canal->id }}">
                </div>
                <div class="gray-background"></div>
                <div class="profile-photo" style="background-image: url('/uploads/{{ $canal->imagem_perfil }}');"></div>
            </div>
            <div class="nome-do-canal">
                <h1>{{ $canal->nome }}</h1>
                <h1 style="font-size: 16px; color: grey; margin-top: -10px;" id="numInscritos">{{ $canal->inscritos }} Inscritos</h1>
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
                            <p class="video-info">Publicado {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }} - {{ $video->visualizacao }} visualizações</p>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#inscrever-se-btn').click(function() {
            var canal_id = "{{ $canal->id }}";

            // Envie uma solicitação Ajax ao servidor para curtir
            $.ajax({
                type: 'POST',
                url: '{{ route("inscrever.se") }}',
                data: { canal_id: canal_id, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    document.getElementById('numInscritos').textContent = response.inscritos +  " Inscritos";
                    var subscribeButton = document.getElementById('inscrever-se-btn');
                    if (response.mensagem == "Seguiu") {
                        subscribeButton.classList.add('inscrito'); // Adiciona a classe para indicar que foi curtido
                        document.getElementById('inscrever-se-btn').textContent = "Inscrito";
                    } else {
                        subscribeButton.classList.remove('inscrito'); // Remove a classe para indicar que foi descurtido
                        document.getElementById('inscrever-se-btn').textContent = "Inscrever-se";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao processar a solicitação Ajax:', error);
                }
            });
        });
    });
</script>

<script>
    function redirecionarParaLogin() {
        window.location.href = "{{ route('login') }}";
    }
</script>

</body>
@endsection
