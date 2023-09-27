<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cadastro.css') }}">
</head>

<body style="color: rgb(43,48,52); background: #1A1818; height: 100vh; display: flex; justify-content: center; align-items: center;">
<!-- Start: Login Form Basic -->
<form class="form @if(isset($msg) && !empty($msg)) has-error @endif" method="post" action="/cadastro">
    @csrf       
    <p id="heading">Cadastro</p>
    <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 22 22">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"></path>
        </svg>
        <input autocomplete="off" placeholder="Nome" class="input-field" type="text" name="nome">
    </div>
    <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 22 22">
            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
        </svg>
        <input autocomplete="off" placeholder="E-mail" class="input-field" type="text" name="email">
    </div>
    <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
        </svg>
        <input placeholder="Senha" class="input-field" type="password" name="senha">
    </div>
    <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 22 22">
            <path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"></path>
        </svg>
        <input placeholder="Data de Nascimento" class="input-field" type="date" name="data_nascimento">
    </div>

    <div class="alerta">
        @if(isset($msg) && !empty($msg))
            <p>{{ $msg }}</p>
        @endif
    </div>

    <div class="btn">
        <a href="/home-visitor">
            <button class="button2" style="margin-right: 7px;" type="button">Entrar como visitante</button>
        </a>
        <button class="button2" style="margin-left: 7px;" type="submit" formaction="/cadastro">Cadastre-se</button>
    </div>
    <div style="font-family: 'Questrial', sans-serif; color: white; font-size: 13px; text-align: center; margin-top: -0.4em;">
        <a>Já tem uma conta?</a>
        <a href="/login" style="text-decoration: underline; color: white;">Faça login</a>
    </div>
</form>

<!-- End: Login Form Basic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/resources/js/script.min.js?h=35a745003519d0480832903c736bc4ec"></script>
<img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Polygon1.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvbHlnb24xLnBuZyIsImlhdCI6MTY5NTIzNzM0NiwiZXhwIjoxNzI2NzczMzQ2fQ.iEm9n0CxhCo5XZMxVVLO82oW9eTrNzyExYu4jMgucZQ&t=2023-09-20T19%3A15%3A46.147Z" alt="Triângulo" class="triangle-image">
<img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Polygon2.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvbHlnb24yLnBuZyIsImlhdCI6MTY5NTIzNzM5MCwiZXhwIjoxNzI2NzczMzkwfQ.bPyOQtPZclreS8rB54xgi16u0UJbU3cuglOJSFiTols&t=2023-09-20T19%3A16%3A30.076Z" alt="Triângulo" class="triangle-image2">
<img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Video.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1ZpZGVvLnBuZyIsImlhdCI6MTY5NTIzNzE5MiwiZXhwIjoxNzI2NzczMTkyfQ.eNEc9UbyE-R8FvUIEFluv1idyFtPoZb0dAxgoVPy9zs&t=2023-09-20T19%3A13%3A12.647Z" alt="Logo" class="logo">
</body>
</html>