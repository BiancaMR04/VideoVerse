<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de vídeos </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload_video.css') }}">
</head>
<body style="background: #1A1818;">
    <img src="{{ asset('assets/img/Vídeo.png') }}" alt="Minha Imagem" class="image">
    <div class="col-xl-8">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="caixaDePesquisa" class="caixadebusca" placeholder=" Pesquisar..." autocomplete="on" style="font-size: 16px; border-radius: 10.166px;border: 1.017px solid rgba(255, 255, 255, 0.10);background: #323232;width: 550px;color: rgb(255,255,255);height: 26px;margin-left: 710px;margin-top: 20px;">
    </div>
    <div class="sidebar">
        <div class="icon-container" style="margin-top: 130px;">
            <div class="icon">
                <img src="{{ asset('assets/img/home.png')}}" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Início</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Canais-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Canais</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Musica-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Música</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Podcasts-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Pocasts</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Educação-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Educação</span>
        </div>
        <div class="icon-container" style="margin-top: 100px;">
            <div class="icon">
                <img src="assets/img/Inscrições-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Incrições</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Favoritos-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Favoritos</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Recentes-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Recentes</span>
        </div>
        <div class="icon-container" style="margin-top: 130px;">
            <div class="icon">
                <img src="assets/img/Ajustes-icon.png" width="32" height="28" style="width: 36px;height: 36px;">
            </div>
            <span class="icon-label">Configurações</span>
        </div>
        <div class="icon-container">
            <div class="icon">
                <img src="assets/img/Sair-icon.png" width="32" height="28" style="width: 34px;height: 34px; margin-left: 3px">
            </div>
            <span class="icon-label">Sair</span>
        </div>
    </div>

    <h1 class="card-header">Upload de Vídeo</h1>
    <div class="card-body">
        <div class= "video-preview">
            <video id="preview_video" width="620" height="400" controls ></video>
            <div class="upload">    
                <input type="file" id="upload_video" name="upload_video" accept="video/*" onchange="previewFile()"></input>
            </div>
        </div>
        <div class="formulario">
        <div class="card mb-4 mb-xl-5">
            <input type="file" name="foto-video" id="foto-video" accept="image/*" style="display: none;">
            <label for="foto-video" style="cursor: pointer;">
            <img id="preview_foto" style="width: 200px; height: 100px; border: 2px solid black; margin-top: 2em; margin-top: -10px;" src="{{ asset('images.jpeg') }}">
            <p class="legenda" >Imagem do vídeo</p>
            </label>
        </div>
        <div class="mb-3">
            <label for="titulo_video" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo_video" name="titulo_video" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
        </div>
            <div class="categorias">
                <label class="form-label">Categoria(s) do Vídeo</label>
                <div>
                    <input type="checkbox" id="categoria1" class=categoria name="categorias[]" value="categoria1">
                    <label for="categoria1">Animação</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria2" class=categoria name="categorias[]" value="categoria2">
                    <label for="categoria2">Jogos</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria3" class=categoria name="categorias[]" value="categoria3">
                    <label for="categoria3">Educação</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria4" class=categoria name="categorias[]" value="categoria4">
                    <label for="categoria4">Entreterimento</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria5" class=categoria name="categorias[]" value="categoria5">
                    <label for="categoria5">Música</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria6" class=categoria name="categorias[]" value="categoria6">
                    <label for="categoria6">Podcast</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria7" class=categoria name="categorias[]" value="categoria7">
                    <label for="categoria7">Cúlinaria</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria8" class=categoria name="categorias[]" value="categoria8">
                    <label for="categoria8">Saúde</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
                    <label for="categoria9">Vlogs</label>
                </div>
                <div>
                    <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
                    <label for="categoria9">Notícias</label>
                </div> 
                <div>
                    <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
                    <label for="categoria9">Infantil</label>
                </div>
                <button type="submit" class="enviar-button">Enviar</button>
            </div>
        </div>
    <script>
            function previewFile() {
                var preview = document.querySelector('#preview_video');
                var file    = document.querySelector('#upload_video').files[0];
                var reader  = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                }

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = "";
                    }
            }

        var inputFoto = document.getElementById('foto-video');
        var previewfoto = document.getElementById('preview_foto');

        // Define um ouvinte de evento para o campo de arquivo do fundo
        inputFoto.addEventListener('change', function() {
            if (inputFoto.files && inputFoto.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Define o atributo 'src' da imagem de pré-visualização do fundo com a imagem carregada
                    previewfoto.src = e.target.result;
                };

                // Lê o arquivo selecionado como um URL de dados
                reader.readAsDataURL(inputFoto.files[0]);
            }
        });
        </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
                <script src="/assets/js/script.min.js?h=7943ac0cdc1b9005d36ad60ce20571b3"></script>
    </body>
</html>