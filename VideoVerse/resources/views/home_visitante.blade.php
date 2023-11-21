<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">

@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

    </div>
    <div class="content">
        <div class="video-grid">
        @foreach ($publicVideos as $video)
                @if ($video->estado_video == 'publico')
                <div class="video">
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
    <script src="js/home.js"></script>

    <script>
        // Adicionando um evento de escuta para capturar a tecla Enter ou o clique no ícone de pesquisa
        const input = document.getElementById('caixaDePesquisa');
        input.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                fazerPesquisa();
            }
        });

        // Função para enviar os dados da pesquisa para o backend
        function fazerPesquisa() {
            const termoDePesquisa = document.getElementById('caixaDePesquisa').value;
            
            // Aqui você pode enviar o termoDePesquisa para o backend usando fetch ou XMLHttpRequest
            // Exemplo de uso do fetch:
            fetch('/pesquisar', {
                method: 'POST',
                body: JSON.stringify({ termo: termoDePesquisa }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                // Lógica para lidar com a resposta do backend, se necessário
            })
            .catch(error => {
                // Lidar com erros, se houver
            });
        }
    </script>
</body>
@endsection
