
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/monetizacao.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
    
    <div class="container">
        <h1 class="text-center text-white" style="margin-top: 70px; margin-bottom: 30px;">Monetização</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($videosDoUsuario->isEmpty())
                    <p class="text-center text-white" style="margin-top: 25px;">Você ainda não postou nenhum vídeo! :c.</p>
                    <p class="text-center text-white">Você precisa ter ao menos um vídeo no seu canal para ativar a função de monetização</p>
                @else

                    <div class="conteiner">
                        <h2 class="text-white">Vídeos de <span class="text-purple" style="color: #b42df4">{{ $nomeCanal }}</span>:</h2>
                        <ul style="background-color: #1A1818; color: whte; width: 600px; margin-top: 25px;" class="list-group lista">
                            @foreach ($videosDoUsuario as $video)
                                <li style="background-color: #1a1818; color: white; width: 600px;" class="list-group-item">{{ $video->titulo }} - {{ $video->visualizacao }} visualizações</li>
                            @endforeach
                        </ul>
                    </div>

                    <p class="text-center text-white mt-4">Total de Visualizações: {{ $somaVisualizacoes }}</p>
                    <p class="text-center text-white">Valor total de referente as {{ $somaVisualizacoes }} visualizações: R$ {{ number_format($valorTodasVisualizacoes, 2) }}</p>
                    <p class="text-center text-white">Valor já sacado previamente: R$ {{ number_format($valorRetirado, 2) }}</p>
                    <p class="text-center text-white">Valor disponível para saque: R$ {{ number_format($valorTotal, 2) }}</p>

                    <form method="POST" action="{{ route('retirar_valor') }}" class="text-center">
                        @csrf
                        <button type="submit" class="button" style="margin-top: 20px;">Retirar Valor</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection
