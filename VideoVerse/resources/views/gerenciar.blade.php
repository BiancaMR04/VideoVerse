<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gerenciar.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
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
        <a href="javascript:void(0);" onclick="toggleListaReports()"><i class="fas fa-exclamation-triangle"></i>__Listar Denúncias</a>
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

    <div class="reports-lista">
    <h1 style="color: white; margin-left: 350px;">Lista de Denúncias</h1>
    @foreach ($denuncias as $denuncia)
        <form method="POST" action="{{ route('excluir.report', ['id' => $denuncia->id]) }}">
            @csrf
            <div class="item-lista-report">
                <a href="{{ route('video.show', ['id' => $denuncia->video->id]) }}" class="information_video">
                    <img src="{{ $denuncia->video->caminho_imagem }}" alt="Thumbnail do Vídeo" class="thumbnail">
                    <div class="info">
                        <h2 style="font-size: 20px; margin-top: 20px;">{{ $denuncia->video->titulo }}</h2>
                        <p style="margin-bottom: 0px;">{{ $denuncia->video->canal->nome }}</p>
                        <p style="color: grey; margin-bottom: 20px;">{{ $denuncia->video->visualizacao }} visualizações - {{ \Carbon\Carbon::parse($denuncia->video->data)->format('d/m/Y') }}</p>
                    </div>
                </a>
                <p style="margin-left: 5px; margin-top: 8px; margin-bottom: 8px;">
                    <span style="color: #b42df4;">{{ $denuncia->user->name }}</span>
                    reportou o vídeo
                    <a style="text-decoration: none;" href="{{ route('video.show', ['id' => $denuncia->video->id]) }}">
                        <span style="color: #b42df4;">{{ $denuncia->video->titulo }}</span>
                    </a>
                    por
                    <span style="color: red;">{{ $denuncia->denuncia }}</span>
                </p>
                <!-- Botão para concluir o relatório -->
                <button class="gerenciar-button" type="submit">Concluir</button>
                
                <!-- Formulário para excluir o vídeo -->
                <form method="POST" action="{{ route('excluir.video', ['id' => $denuncia->video->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="excluir-video-button">Excluir Vídeo</button>
                </form>
                
                <!-- Descrição do relatório -->
                <div class="descricao">
                    <p style="margin-left: 5px; margin-top: 8px; margin-bottom: 8px;">Descrição: {{ $denuncia->descricao }}</p>
                </div>
            </div>
        </form>
    @endforeach
</div>

    @else
    <h1 style="color: white; margin-left: 250px; margin-top: 20px;">Você não tem permissão para acessar essa página</h1>
    @endif
</div>

<script>
    function toggleDescricao(descricao) {
        var descricao = document.querySelector('.descricao');
        descricao.style.display = (descricao.style.display === 'none' || descricao.style.display === '') ? 'block' : 'none';
    }
</script>

<script>
    function toggleListaUsuarios() {
        var listaUsuarios = document.querySelector('.user-grid');
        listaUsuarios.style.display = (listaUsuarios.style.display === 'none' || listaUsuarios.style.display === '') ? 'block' : 'none';
        document.querySelector('.video-lista').style.display = 'none';
        document.querySelector('.canais-lista').style.display = 'none';
        document.querySelector('.reports-lista').style.display = 'none';
    }
</script>
<script>
    function toggleListaVideos() {
        var listaVideos = document.querySelector('.video-lista');
        listaVideos.style.display = (listaVideos.style.display === 'none' || listaVideos.style.display === '') ? 'block' : 'none';
        document.querySelector('.user-grid').style.display = 'none';
        document.querySelector('.canais-lista').style.display = 'none';
        document.querySelector('.reports-lista').style.display = 'none';
    }
</script>
<script>
    function toggleListaCanais() {
        var ListaCanais = document.querySelector('.canais-lista');
        ListaCanais.style.display = (ListaCanais.style.display === 'none' || ListaCanais.style.display === '') ? 'block' : 'none';
        document.querySelector('.user-grid').style.display = 'none';
        document.querySelector('.video-lista').style.display = 'none';
        document.querySelector('.reports-lista').style.display = 'none';
    }
</script>

<script>
    function toggleListaReports() {
        var ListaReports = document.querySelector('.reports-lista');
        ListaReports.style.display = (ListaReports.style.display === 'none' || ListaReports.style.display === '') ? 'block' : 'none';
        document.querySelector('.user-grid').style.display = 'none';
        document.querySelector('.video-lista').style.display = 'none';
        document.querySelector('.canais-lista').style.display = 'none';
    }
</script>

<script>
    function excluirVideo(videoId) {
        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', "{{ route('excluir.video', ['id' => $video->id]) }}");

    }

</script>

</body>
@endsection