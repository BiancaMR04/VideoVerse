<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Vídeos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload_video.css') }}">
</head>

<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
    
    <div class="main-content">
        <h1 style="color: #B42DF4;" class="card-header">Upload de Vídeo</h1>
        @if(isset($msg))
            <a style="color: red; margin-left: 300px;">{{ $msg }}</a>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('video.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="video-preview">
                    <video id="preview_video" width="960" height="600" controls></video>
                    <div class="upload">
                        <input type="file" id="upload_video" name="upload_video" accept="video/*" onchange="previewFile()" required>
                    </div>
                </div>
                <div class="formulario">
                    <div>
                        <input type="file" name="foto-video" id="foto-video" accept="image/*" style="display: none;">
                        <label for="foto-video" style="cursor: pointer;">
                            <img id="preview_foto" style="background-color: #1a1a1a; margin-top: -190px; margin-left: 50px; width: 300px; height: 150px; border: 2px solid black;" src="{{ asset('images.jpeg') }}">
                            <p class="legenda">Imagem do vídeo</p>
                        </label>
                    </div>
                    <div class="titulo">
                        <label for="titulo_video" class="form-label">Título</label>
                        <div>
                            <input type="text" class="campo-ttulo" id="titulo_video" name="titulo_video" placeholder="Escolha o título do seu vídeo" required>
                        </div>
                    </div>
                    <div class="descricao">
                        <label for="descricao" class="form-label">Descrição</label>
                        <div>
                            <textarea class="campo-descricao" rows="3" id="descricao" name="descricao" placeholder="Use esse espaço para dar uma descrição para seu vídeo! Fale brevemente sobre o seu vídeo, você e seu canal" required></textarea>
                        </div>
                    </div>
                    <div class="privacidade">
                        <label for="privacidade" class="form-label">Privacidade</label>
                        <select class="form-select" aria-label="Default select example" id="privacidade" name="privacidade" required>
                            <option value="publico">Público</option>
                            <option value="privado">Privado</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="enviar-button">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewFile() {
            var preview = document.querySelector('#preview_video');
            var file = document.querySelector('#upload_video').files[0];
            var reader = new FileReader();

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

        inputFoto.addEventListener('change', function () {
            if (inputFoto.files && inputFoto.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    previewfoto.src = e.target.result;
                };

                reader.readAsDataURL(inputFoto.files[0]);
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>
@endsection
