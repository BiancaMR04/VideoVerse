
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
    
    <div class="container">
        <h1 class="text-center text-white" style="margin-top: 70px;">Monetização</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($videosDoUsuario->isEmpty())
                    <p class="text-center text-white" style="margin-top: 25px;">Você ainda não postou nenhum vídeo! :c.</p>
                    <p class="text-center text-white">Você precisa ter ao menos um vídeo no seu canal para ativar a função de monetização</p>
                @else
                    <h2 class="text-white">Vídeos do Usuário:</h2>
                    <ul class="list-group">
                        @foreach ($videosDoUsuario as $video)
                            <li class="list-group-item text-black">{{ $video->titulo }} - {{ $video->visualizacao }} visualizações</li>
                        @endforeach
                    </ul>

                    <p class="text-center text-white mt-4">Soma Total de Visualizações: {{ $somaVisualizacoes }}</p>
                    <p class="text-center text-white">Valor em Dinheiro: R$ {{ number_format($valorTotal, 2) }}</p>

                    <form method="POST" action="{{ route('retirar.valor') }}" class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Retirar Valor</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection
