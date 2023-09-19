<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login_erro.css') }}">
</head>


<body style="color: rgb(43,48,52); background: #1A1818; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <!-- Start: Login Form Basic -->
      <form class="form" method="post" action="/login">
            @csrf
            <p id="heading">Entrar</p>
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
            <div style="text-align: center; margin-top: 0.4em;">
                <p style="color: red; font-size: 14px">{{ $msg }}</p>
            </div>
            <div class="btn">
                <button class="button1">Entrar</button>
            </div>
                <div style="text-align: center; margin-top: 0.2em;">
                    <a style="color: white; font-size: 13px;">Não tem uma conta?</a>
                    <a href="/cadastro" style="text-decoration: underline; color: white; font-size: 13px;">Cadastre-se</a>
                </div>
        </form>
        <!-- End: Login Form Basic -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/resources/js/script.min.js?h=35a745003519d0480832903c736bc4ec"></script>
    </body>
    </html>