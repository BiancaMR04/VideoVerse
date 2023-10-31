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
            <div class="row">
                <div class="col-xl-2 offset-xl-0">
                    <nav class="navbar navbar-light navbar-expand-md">
                        <div class="sidebar">
                            <a href="/">
                                <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Video.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1ZpZGVvLnBuZyIsImlhdCI6MTY5NTIzNzE5MiwiZXhwIjoxNzI2NzczMTkyfQ.eNEc9UbyE-R8FvUIEFluv1idyFtPoZb0dAxgoVPy9zs&t=2023-09-20T19%3A13%3A12.647Z" alt="Logo" class="image">
                            </a>
                            <div class="icon-container" style="margin-top: 130px;">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Inicio-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0luaWNpby1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzU2MiwiZXhwIjoxNzI2NzczNTYyfQ.rDxkg7fLVzZRWYgxYmCOKjkCJ5ol1nkP9gTlaoQXZ5M&t=2023-09-20T19%3A19%3A22.417Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Início</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Canais-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0NhbmFpcy1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzYwOCwiZXhwIjoxNzI2NzczNjA4fQ.pQRUxTFk3tLDGK1zH_dewsL3Wy__qw1-dXFeEldTyIw&t=2023-09-20T19%3A20%3A08.090Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Canais</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Musica-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL011c2ljYS1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzYyMywiZXhwIjoxNzI2NzczNjIzfQ.D49Dn-Mb833xfTjc0CImFzq2NelHfuYfb99iryODTMg&t=2023-09-20T19%3A20%3A23.141Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Música</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Podcasts-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1BvZGNhc3RzLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3NzA5LCJleHAiOjE3MjY3NzM3MDl9.z4tWErm2AAq-c2kGULfJc-QPzRFvOjcjPUPeK3Y6Cqo&t=2023-09-20T19%3A21%3A48.953Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Podcasts</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Educacao-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0VkdWNhY2FvLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3NzUwLCJleHAiOjE3MjY3NzM3NTB9.ToZV4BTgSarS5ap98-ID-NW35s4vJerVHZ8f7UmVPb0&t=2023-09-20T19%3A22%3A30.629Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Educação</span>
                            </div>
                            <div class="icon-container" style="margin-top: 100px;">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Inscricoes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0luc2NyaWNvZXMtaWNvbi5wbmciLCJpYXQiOjE2OTUyMzc3NjMsImV4cCI6MTcyNjc3Mzc2M30.2Mj711PqmgtBIDKLkE004YnjmOMlT0rvK368xFy8-2Q&t=2023-09-20T19%3A22%3A43.840Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Incrições</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Favoritos-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0Zhdm9yaXRvcy1pY29uLnBuZyIsImlhdCI6MTY5NTIzNzY1MiwiZXhwIjoxNzI2NzczNjUyfQ.JQiGVfxanfkyTPed15itPQwkd7jXMdUvF6ZqzAIRmLw&t=2023-09-20T19%3A20%3A52.676Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Favoritos</span>
                            </div>
                            <div class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Recentes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1JlY2VudGVzLWljb24ucG5nIiwiaWF0IjoxNjk1MjM3Njc0LCJleHAiOjE3MjY3NzM2NzR9.FcgJNEpiwat-yW8m1dBnZLQOMho0V53GDW3qOCi_iDM&t=2023-09-20T19%3A21%3A15.774Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Recentes</span>
                            </div>
                            <div class="icon-container" style="margin-top: 130px;">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Ajustes-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL0FqdXN0ZXMtaWNvbi5wbmciLCJpYXQiOjE2OTUyMzc3ODcsImV4cCI6MTcyNjc3Mzc4N30.-Ug28aVXnKF_LM1FrRBKps5tAAFoqYZ359OdKBvcLT4&t=2023-09-20T19%3A23%3A08.010Z" width="32" height="28" style="width: 36px;height: 36px;">
                                </div>
                                <span class="icon-label">Configurações</span>
                            </div>
                            <a href="/login" class="icon-container">
                                <div class="icon">
                                    <img src="https://hlqycjtucbyqizmxjbsq.supabase.co/storage/v1/object/sign/imagens/Sair-icon.png?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJpbWFnZW5zL1NhaXItaWNvbi5wbmciLCJpYXQiOjE2OTUyNDYxMDksImV4cCI6MTcyNjc4MjEwOX0.jPXbmqw3cRts6dJxL5ZXqYYesIB0tNZc9KzlZtwB1k8&t=2023-09-20T21%3A41%3A50.112Z" width="32" height="28" style="width: 33px;height: 33px; margin-left: 3px;">
                                </div>
                                <span class="icon-label">Sair</span>
                            </a>
                        </div>  
                    </nav>
                </div>
                <div class="col-xl-9 offset-xl-0" style="color: rgb(33, 37, 41);border-color: rgb(33,37,41);" >
                    <h1 class="text-center-horizontal" style="color: rgba(255, 255, 255, 0.91); font-family: 'Anek Bangla', sans-serif; text-shadow: 3px 3px 7px rgb(0, 0, 0); margin-left: 300px;">Crie seu canal</h1>
                    
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container position-relative">
                            
                            <section class="position-relative py-4 py-xl-5">
                                <div class="container position-relative" >
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4" style="width: 390.5px;max-width: none;">
                                            <div class="card" style="width: 440px;color: rgba(33,37,41,0);background: rgba(255,255,255,0); margin-top: 20px;" >
                                                <div class="card-body text-center border rounded d-flex float-none flex-column align-items-center" style="width: 769px; min-width: 0px; padding: 0px; margin-left: -11rem; margin-right: 0rem; border-radius: 15px; background: #323232; position: relative; ">
                                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" >
                                                    dd($request->all());
                                                    @if(isset($msg) && !empty($msg))
                                                        <div class="alert alert-danger">
                                                            {{ $msg }}
                                                        </div>
                                                    @endif
                                                    <form action="{{ route('cadastrar_canal') }}" method="post" enctype="multipart/form-data" >
                                                            @csrf
                                                            <div class = "foto-preview">
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
                                                    </div>
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
                            </section>
                            <!-- End: Login Form Basic -->
                        </div>
                    </section>
                    <!-- End: Contact Form Basic -->
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