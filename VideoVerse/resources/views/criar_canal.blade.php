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
                        <div class="container-fluid">
                            <div>
                            <img src="{{ asset('img/home.png') }}" width="32" height="28" style="width: 36px;height: 36px;">
                                <a class="menulateral" href="#home" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Inicial</a>
                                <div style="margin-top: 2rem;">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAW0lEQVR4nMXSwQ2AIBBEURrQZqzFq31ZoDcswTxPJh4IgmD8BfyZ2WwIPcEuT+waWJv+YQvl6ekWUBnoUYCpVXBgxfhWcLFhaRXMLROGf44YMqQE8ba5hH7vfAJufzB5oRubigAAAABJRU5ErkJggg==" width="36" height="36" style="width: 36px;height: 36px;">
                                    <a class="menulateral" href="#channel" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Canais</a>
                                    <div class="menulateral" style="margin-top: 2rem;">
                                        <img src="{{ asset('img/Musica-icon.png') }}" width="32" height="28" style="width: 36px;height: 36px;">
                                        <a class="menulateral" href="#music" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Música</a>
                                        <div style="margin-top: 2rem;">
                                            <img src="{{ asset('img/Podcasts-icon.png') }}" width="32" height="28" style="width: 36px;height: 36px;">
                                            <a class="menulateral" href="#podcast" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Podcasts</a>
                                            <div class="menulateral" style="margin-top: 2rem;">
                                                <img src="{{ asset('img/Educação-icon.png') }}" width="36" height="36" style="width: 36px;height: 36px;">
                                                <a class="menulateral" href="#education" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Educação</a>
                                                <div style="margin-top: 2rem;">
                                                    <img src="{{ asset('img/Inscrições-icon.png') }}" width="36" height="36" style="width: 36px;height: 36px;">
                                                    <a href="#registrations" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Inscrições</a>
                                                    <div class="menulateral" style="margin-top: 2rem;">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABmklEQVR4nO2VzStEURjGx6iRjyzMsFCIhQ3lo8mKhVA2mvwlxmqWxsaOjbKzsJSRjZSPjb9AslIoinwNybDCT6d5bk7TnesOdxbKW2/NPc9znt+dt3vPDYX+qxwFxEz79EVLDW8BloAbvuoSSAO1lq9Wa1eW7xpYBJq/gwwCWWvjQ8H1MdCpNr+dysrr1C0wUAzSBNzJuAl0WdoYcCLtQo3WRi1ft/Y6/67BDTQnwzYQdtHrgH3rrvfMmosvDOzIk3YDHUkc9BhtPbCroBoP35CyDtzEnMSiAX6L/INi6tlNfJUYDQAUU1bOa3TDAYBGlHXoJs5KzAQAWlfWjJvYqPF9AJO/gEwo46XoqQJMWy9qzw8gvcCjMqa8jBXAmoz3QLwESNw6RVZN1ncbIsCG89QACR+QceBJe7aAKr93Z2Ar2vgGJD28SXnQnogvSEFICnhXyII9DvJjnpdmPKmSAQWwhHnDFbgMVKqXnbffz3j9wvqt705G7Xyn+gKBWLA24Mw6vU+B1kAhFqwDOFe3lwViwapNlxXyJ+oThKq06TosO84AAAAASUVORK5CYII=" width="36" height="36" style="width: 36px; height: 36px;">
                                                        <a class="menulateral" href="#favorites" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Favoritos</a>
                                                        <div style="margin-top: 2rem;">
                                                            <img src="{{ asset('img/Recentes-icon.png') }}" width="36" height="36" style="width: 36px;height: 36px;">
                                                            <a class="menulateral" href="#recent" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Recente</a>
                                                            <div class="menulateral" style="margin-top: 2rem;">
                                                                <img src="{{ asset('img/Ajustes-icon.png') }}" width="36" height="36" style="width: 36px;height: 36px;">
                                                                <a class="menulateral" href="#settings" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Ajustes</a>
                                                                <div class="menulateral" style="margin-top: 2rem;">
                                                                    <div class="menulateral" style="margin-top: 2rem;">
                                                                        <img src="{{ asset('img/Sair-icon.png') }}" width="36" height="36" style="width: 36px;height: 36px;">
                                                                        <a class="menulateral" href="#exit" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Sair</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-9 offset-xl-0" style="color: rgb(33, 37, 41);border-color: rgb(33,37,41);">
                    <h1 class="text-center-horizontal" style="color: rgba(255, 255, 255, 0.91); font-family: 'Anek Bangla', sans-serif; text-shadow: 3px 3px 7px rgb(0, 0, 0); margin-left: 300px;">Crie seu canal</h1>
                    <!-- Start: Contact Form Basic -->
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container position-relative">
                            <!-- Start: Login Form Basic -->
                            <section class="position-relative py-4 py-xl-5">
                                <div class="container position-relative">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4" style="width: 390.5px;max-width: none;">
                                            <div class="card" style="width: 440px;color: rgba(33,37,41,0);background: rgba(255,255,255,0); margin-top: -250px;">
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
                                                            <input type="file" name="foto_fundo" id="foto_fundo" accept="image/*" style="display: none;">
                                                            <label for="foto_fundo" style="cursor: pointer;">
                                                                <img id="preview_fundo" style="width: 700px; height: 150px; border: 2px solid black; border-radius: 10px; margin-top: -10px;" src="{{ asset('images.jpeg') }}">
                                                                <p style="color: #767676; width: 152.281px; height: 11px; margin-top: -5px; line-height: normal; font-size: 14px; margin-right: -5px;">Alterar foto de fundo</p>
                                                            </label>
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
                                                        <div class="mb-3">
                                                            <p style="width: 144px; min-width: 0; height: 6px; max-width: none; border-width: 0px; border-color: #9c9c9c; color: #9c9c9c; font-size: 18px; text-shadow: 1px 1px 0px #787878;">Conta</p>
                                                            <label for="conta" class="form-label">Conta</label>
                                                            <input type="text" class="form-control" id="conta" name="conta" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p style="width: 144px; min-width: 0; height: 6px; max-width: none; border-width: 0px; border-color: #9c9c9c; color: #9c9c9c; font-size: 18px; text-shadow: 1px 1px 0px #787878;">Banco</p>
                                                            <label for="banco" class="form-label">Banco</label>
                                                            <input type="text" class="form-control" id="banco" name="banco" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p style="width: 144px; min-width: 0; height: 6px; max-width: none; border-width: 0px; border-color: #9c9c9c; color: #9c9c9c; font-size: 18px; text-shadow: 1px 1px 0px #787878;">Agência</p>
                                                            <label for="agencia" class="form-label">Agência</label>
                                                            <input type="text" class="form-control" id="agencia" name="agencia" required>
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
                
            @endsection
            <script>
                // Função para fechar o dropdown quando o usuário clicar fora dele
                window.onclick = function(event) {
                    if (!event.target.matches('#profile-image')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.style.display === "block") {
                                openDropdown.style.display = "none";
                            }
                        }
                    }
                }

                
            </script>
                        <script>
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
        // Obtém o elemento de entrada de arquivo e a imagem de pré-visualização do fundo
        var inputFotoFundo = document.getElementById('foto_fundo');
        var previewFundo = document.getElementById('preview_fundo');

        // Define um ouvinte de evento para o campo de arquivo do fundo
        inputFotoFundo.addEventListener('change', function() {
            if (inputFotoFundo.files && inputFotoFundo.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Define o atributo 'src' da imagem de pré-visualização do fundo com a imagem carregada
                    previewFundo.src = e.target.result;
                };

                // Lê o arquivo selecionado como um URL de dados
                reader.readAsDataURL(inputFotoFundo.files[0]);
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
