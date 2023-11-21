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
    <div class="content">
    <h1 style = "color: white; margin-left:300px;" >Lista de Usuários</h1>

        <div class="video-grid">
            
            @foreach($users as $user)
        <p style=" color: white;">{{ $user->name }} | <form method="POST" action="{{ route('excluir.usuario', ['id' => $user->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form></p>
    @endforeach
        </div>
    </div>
</body>
@endsection

