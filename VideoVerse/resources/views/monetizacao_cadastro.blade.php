<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monetização</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/monetizacao.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<body style="background: #1A1818;">
@extends('layouts.upbar')
@extends('layouts.sidebar')

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="text-center text-white" style="margin-top: 20px;">Monetização</h1>
        <a style="color: white; margin-left: 20px; display: block;">Primeiro, insira suas informações bancárias para monetizar</a>
        <a style="color: white; margin-left: 45px; display: block;">seus vídeos e receber os pagamentos relacionados!!</a>
        <form action="{{ route('monetizacao_cadastro') }}" method="post">
            @csrf
            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Número da Conta Bancária</p>
                <input type="text" class="nome" id="conta" name="conta" required placeholder="Ex.: 12345-6">
            </div>

            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Agência Bancária</p>
                <input type="text" class="nome" id="agencia" name="agencia" required placeholder="Ex.: 1234-5">
            </div>

            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Código do Banco</p>
                <input type="text" class="nome" id="banco" name="banco" required placeholder="Ex.: 123">
            </div>

            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Nome do Titular da Conta</p>
                <input type="text" class="nome" id="nome" name="nome" required placeholder="Ex.: Maria Luiza Ribeiro Rocha">
            </div>

            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">CPF</p>
                <input type="text" class="nome" id="cpf" name="cpf" required placeholder="Ex.: 123.456.789-10">
            </div>

            <div>
                <button type="button" href="/home" class="btn-cancelar">Cancelar</button>
                <button type="submit" class="btn-criar">Criar Canal</button>
            </div>
        </form>
    </div>
</div>
</body>
@endsection
