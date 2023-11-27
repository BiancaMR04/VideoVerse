<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">
</head>
<style>
        body {
            background: #1A1818;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .opções.admin {
            text-align: center;
            color: white;
        }

        .icons a {
            display: block;
            margin-bottom: 10px;
            color: white;
        }
        .element.style{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-left: 0px;
        }
    </style>
<body style="background: #1A1818;">
 
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

    <div class="content">
        <div class="opções admin"> 
            
    @if (Auth::user()->adm)
                <!-- Se o usuário for um administrador -->
            <h1 style="color: white; margin-left: 250px; margin-top: 20px;">Bem-vindo, {{ Auth::user()->name }}</h1>
            <h2 style="color: white; margin-left: 250px; margin-top: 20px;">O que você deseja fazer?</h2>   
            <div class="icons">
                <!-- 4 ícones para lista de usuários, canais, vídeos e reports -->
                <a href="{{ route('lista.usuarios') }}"><i class="fas fa-users"></i> Lista de Usuários</a>
                <a href="#"><i class="fas fa-list"></i> Lista de Canais</a>
                <a href="{{ route('lista.videos') }}"><i class="fas fa-film"></i> Lista de Vídeos</a>
                <a href="#"><i class="fas fa-exclamation-triangle"></i> Lista de Reports</a>
            </div>
            @else
    <h1 style="color: white; margin-left: 250px; margin-top: 20px;">Você não tem permissão para acessar essa página</h1>
        </div>
    </div>
    @endif
</body>
@endsection
