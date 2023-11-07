<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="VideoVerse/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/criar_canal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
<div class="col-xl-9 offset-xl-0" style="color: rgb(33, 37, 41); border-color: rgb(33, 37, 41);">
    <h1 class="text-center-horizontal" style="color: rgba(255, 255, 255, 0.91); font-family: 'Anek Bangla', sans-serif; text-shadow: 3px 3px 7px rgb(0, 0, 0); margin-left: 750px; margin-top: 50px;">Crie seu canal</h1>

    <div class="col-md-6 col-xl-4" style="width: 390.5px; max-width: none;">
        <div class="card" style="width: 440px; color: rgba(33, 37, 41, 0); background: rgba(255, 255, 255, 0); margin-top: 20px; margin-left: 750px;">
            <div class="card-body text-center border rounded d-flex float-none flex-column align-items-center" style="width: 769px; min-width: 0px; padding: 0px; margin-left: -11rem; margin-right: 0rem; border-radius: 15px; background: #323232; position: relative;">
                <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                    dd($request->all());
                    @if(isset($msg) && !empty($msg))
                        <div class="alert alert-danger">
                            {{ $msg }}
                        </div>
                    @endif
                    <form action="{{ route('cadastrar_canal') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="foto-preview">
                            <input type="file" name="foto_fundo" id="foto_fundo" accept="image/*" style="display: none;">
                            <label for="foto_fundo" style="cursor: pointer;">
                                <img id="preview_fundo" style="width: 700px; height: 150px; border: 2px solid black; border-radius: 10px; margin-top: -10px;" src="{{ asset('images.jpeg') }}">
                                <p style="color: #767676; width: 152.281px; height: 11px; margin-top: -5px; line-height: normal; font-size: 14px; margin-right: -5px;">Alterar foto de fundo</p>
                            </label>
                        </div>
                        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*" style="display: none;">
                        <label for="foto_perfil" style="cursor: pointer;">
                            <img id="preview" style="border: 2px solid black; border-radius: 50px; width: 100px; height: 100px; margin-top: -50px;" src="{{ asset('profile.jpg') }}">
                            <p style="line-height: normal; font-size: 14px; color: #767676; width: 139.875px; min-width: 143px; height: 103px; margin-bottom: -250px; margin-right: 0rem;">Alterar foto de perfil</p>
                        </label>
                        <div class="mb-3">
                            <p style="width: 144px; min-width: 0; height: 6px; max-width: none; border-width: 0px; border-color: #9c9c9c; color: #9c9c9c; font-size: 18px; text-shadow: 1px 1px 0px #787878;">Nome do canal</p>
                            <label for="nome_canal" class="form-label">Nome do Canal</label>
                            <input type="text" class="form-control" id="nome_canal" name="nome_canal" required>
                        </div>
                        <div class="mb-3">
                            <p style="color: #9c9c9c; font-size: 18px; width: 93px; height: 7px;">Descrição</p>
                            <label for="descricao" class="form-label">Descrição do Canal</label>
                            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                        </div>
                        <div data-reflow-type="category-list" data-reflow-layout="unstyled"></div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Próximo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
     
<script>
    function previewFile() {
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
            
        // Obtém o elemento de entrada de arquivo e a imagem de pré-visualização
        var inputFoto = document.getElementById('foto_perfil');
        var preview = document.getElementById('preview');

        // Define um ouvinte de evento para o campo de arquivo
        inputFoto.addEventListener('change', function() {
            if (inputFoto.files && inputFoto.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Define o atributo 'src' da imagem de pré-visualização com a imagem carregada
                    preview.src = e.target.result;
                };

                // Lê o arquivo selecionado como um URL de dados
                reader.readAsDataURL(inputFoto.files[0]);
            }
        });
 </script>

    <script>
        function previewFile2() {
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
        // Obtém o elemento de entrada de arquivo e a imagem de pré-visualização do fundo
        var inputFoto2 = document.getElementById('foto_fundo');
        var previewFundo = document.getElementById('preview_fundo');

        // Define um ouvinte de evento para o campo de arquivo do fundo
        inputFoto2.addEventListener('change', function() {
            if (inputFoto2.files && inputFoto2.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Define o atributo 'src' da imagem de pré-visualização do fundo com a imagem carregada
                    previewFundo.src = e.target.result;
                };

                // Lê o arquivo selecionado como um URL de dados
                reader.readAsDataURL(inputFoto2.files[0]);
            }
        }
    );
    </script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
             <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
             <script src="/assets/js/script.min.js?h=7943ac0cdc1b9005d36ad60ce20571b3"></script>
@endsection
</body>

</html>
