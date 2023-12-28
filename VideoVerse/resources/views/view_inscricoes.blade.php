<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/view_inscricoes.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">
    @section('content')
    @extends('layouts.upbar')
    @extends('layouts.sidebar')
        <h1 style="color: white; margin-left: 260px; margin-top: 50px; margin-bottom: 50px;" class="title">Suas inscrições:</h1>
        <div class="content">
            <div class="channel-grid">
                @if(count($canaisInscritos) > 0)
                    @foreach ($canaisInscritos as $canal)
                        <div class="channel">
                            <a href="{{ route('view.canal', ['canalId' => $canal->id]) }}">
                                <img src="uploads/{{ $canal->imagem_perfil }}" alt="Foto do Canal" class="foto-do-canal">
                                <h2 class="titulo-canal">{{ $canal->nome }}</h2>
                                <p class="canal-info">{{ $canal->inscritos }} inscritos</p>
                                @foreach ($inscricoes as $inscricao)
                                    @php
                                        $dataInscricao = \Carbon\Carbon::parse($inscricao->created_at);
                                        $diasDesdeInscricao = $dataInscricao->diffInDays(\Carbon\Carbon::now());
                                        $mensagemInscricao = ($diasDesdeInscricao == 0) ? 'Inscreveu-se hoje' : "Inscrito há {$diasDesdeInscricao} dias";
                                    @endphp
                                    @if ($inscricao->canal_id == $canal->id)
                                        <p class="canal-info">{{ $mensagemInscricao }}</p>
                                    @endif
                                @endforeach
                            </a>
                        </div>
                    @endforeach
                @else
                    <h1 style="color: white; margin-left: 260px; margin-top: 50px; margin-bottom: 50px;">Você não está inscrito em nenhum canal</h1>
                @endif
            </div>
        </div>
</body>
@endsection

