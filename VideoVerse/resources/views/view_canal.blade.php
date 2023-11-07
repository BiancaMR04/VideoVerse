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
        <h1 class="title">Meu Canal</h1>
        <div class="cover-photo">
            <div class="btn">
                <button class="inscrever-se-button">Inscrever-se</button>
            </div>
            <div class="gray-background">
                
            </div>
                <!-- Foto de Perfil Redonda -->
                <div class="profile-photo" style="background-image: url('https://img.quizur.com/f/img648ca358045449.79012472.jpg?lastEdited=1686938471');"></div>
            </div>
            <div class="nome-do-canal">
                <h1>Ovelhinha lovers</h1>
                <h1 style="font-size: 16px; color: grey; margin-top: -10px;">1000 Inscritos</h1>
            </div>
        <div class="channel-info">
            <p>Explore o vasto mundo de Minecraft conosco! Em nosso canal, você encontrará aventuras emocionantes, construções criativas e desafios épicos enquanto mergulha neste universo pixelizado. Acompanhe-nos em jornadas para desvendar segredos, enfrentar monstros e construir incríveis estruturas!</p>
        </div>
        <h1 class="title" style="margin-top: 40px; margin-left: 500px; font-size: 24px;">Vídeos</h1>
        <div class="gray-background2"></div>
    </div>
</body>
@endsection
