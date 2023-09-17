<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Tela de Cadastro</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="/resources/css/styles.min.css">
</head>
<style>
.form {
max-width: 800px;
margin: 0 auto;
display: flex;
flex-direction: column;
gap: 15px;
padding-left: 4em;
padding-right: 4em;
padding-bottom: 4em;
background-color: #171717;
border-radius: 25px;
transition: .4s ease-in-out;
}

.form:hover {
transform: scale(1.05);
border: 1px solid #B42DF4;
}

#heading {
text-align: center;
margin: 2em;
color: #B42DF4;
font-size: 1.7em;
}

.field {
display: flex;
align-items: center;
justify-content: center;
gap: 0.5em;
border-radius: 25px;
padding: 1em;
border: none;
outline: none;
color: white;
background-color: #171717;
box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
}

.input-icon {
height: 1.3em;
width: 1.3em;
fill: white;
}

.input-field {
background: none;
border: none;
outline: none;
width: 100%;
color: #d3d3d3;
}

.form .btn {
display: flex;
justify-content: center;
flex-direction: row;
margin-top: 2.5em;
}

.button2 {
padding: 0.5em;
padding-left: 2.3em;
padding-right: 2.3em;
border-radius: 5px;
width: 250px;
height: 50px;
border: none;
outline: none;
transition: .4s ease-in-out;
background-color: #252525;
color: white;
}

.button2:hover {
background-color: #B42DF4;
color: white;
}

.logo {
    display: block;
    margin-left: 500px;
    margin-top: -50px; /* Adicione margem à esquerda para mover a imagem para a direita */
}


</style>

<body style="color: rgb(43,48,52); background: #1A1818; height: 100vh; display: flex; justify-content: center; align-items: center;">
<!-- Start: Login Form Basic -->
<form class="form" method="post" action="/cadastro">
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

    <div id="mensagemErro" style="color: red;">
    </div>

    <div class="btn">
        <button class="button2">Cadastre-se</button>
    </div>
    <div style="text-align: center; margin-top: -0.4em;">
        <a style="color: white; font-size: 13px; display:">Já tem uma conta?</a>
        <a href="/login" style="text-decoration: underline; color: white; font-size: 13px;">Faça login</a>
    </div>
</form>



<!-- End: Login Form Basic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/resources/js/script.min.js?h=35a745003519d0480832903c736bc4ec"></script>
</body>
</html>