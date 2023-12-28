<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Criar Canal</title>
    <link rel="stylesheet" href="VideoVerse/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/criar_canal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')


@if (Auth::user()->canal)
<h1 class="title">Edite seu canal</h1>

<div class="card">
    <div class="card-body @if (isset($msg)) error @endif">
        <form action="{{ route('editar_canal', ['id' => $canal->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="foto-preview">
                <input type="file" name="foto_fundo" id="foto_fundo" accept="image/*" style="display: none;">
                <label for="foto_fundo" style="cursor: pointer;">
                    <img id="preview_fundo" class="preview-fundo" src="{{ asset('uploads/' . $canal->imagem_fundo) }}">
                    <p style="color: #767676; width: 152.281px; height: 11px; margin-top: 8px; line-height: normal; font-size: 14px; margin-right: -5px;">Alterar foto de fundo</p>
                </label>
            </div>

            <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*" style="display: none;">
            <label for="foto_perfil" style="cursor: pointer;">
                <img id="preview" class="preview-foto" src="{{ asset('uploads/' . $canal->imagem_perfil) }}">
                <p style="line-height: normal; font-size: 14px; color: #767676; margin-top: 8px; margin-left: 250px;">Alterar foto de perfil</p>
            </label>

            @if (isset($msg))
                <div style="color: red; margin-left: 25px;" role="alert">
                    {{ $msg }}
                </div>
            @endif
            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px;">Nome do canal</p>
                <input type="text" class="nome" id="nome_canal" name="nome_canal" value="{{ old('nome_canal', $canal->nome) }}" >
            </div>

            <div style="overflow-y: none;">
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Descrição</p>
                <textarea class="descricao" id="descricao" name="descricao" rows="4">{{ old('descricao', $canal->descricao) }}</textarea>
            </div>

            <div data-reflow-type="category-list" data-reflow-layout="unstyled"></div>

            <div>
                <button type="button" class="btn-cancelar-editar">Cancelar</button>
                <button type="submit" class="btn-criar">Salvar</button>
            </div>
        </form>
    </div>
</div>

@else
<h1 class="title">Crie seu canal</h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('cadastrar_canal') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="foto-preview">
                <input type="file" name="foto_fundo" id="foto_fundo" accept="image/*" style="display: none;">
                <label for="foto_fundo" style="cursor: pointer;">
                    <img id="preview_fundo" class="preview-fundo" src="{{ asset('capa.jpeg') }}">
                    <p style="color: #767676; width: 152.281px; height: 11px; margin-top: 8px; line-height: normal; font-size: 14px; margin-right: -5px;">Alterar foto de fundo</p>
                </label>
            </div>

            <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*" style="display: none;">
            <label for="foto_perfil" style="cursor: pointer;">
                <img id="preview" class="preview-foto" src="{{ 'foto.jpg' }}">
                <p style="line-height: normal; font-size: 14px; color: #767676; margin-top: 8px; margin-left: 250px;">Alterar foto de perfil</p>
            </label>

            <div>
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px;">Nome do canal</p>
                <input type="text" class="nome" id="nome_canal" name="nome_canal" required placeholder="Escolha um nome para seu canal">
            </div>

            <div style="overflow-y: none;">
                <p style="color: #9c9c9c; font-size: 18px; margin-left: 20px; margin-top: 20px;">Descrição</p>
                <textarea class="descricao" id="descricao" name="descricao" rows="2" required placeholder="Escreva brevemente sobre seu canal e seus vídeos"></textarea>
            </div>

            <div data-reflow-type="category-list" data-reflow-layout="unstyled"></div>

            <div>
                <button type="button" class="btn-cancelar-criar">Cancelar</button>
                <button type="submit" class="btn-criar">Criar Canal</button>
            </div>
        </form>
    </div>
</div>
@endif

<script>
    document.querySelector('.btn-cancelar-criar').addEventListener('click', function() {
    window.location.href = '/home';
});
</script>

<script>
    document.querySelector('.btn-cancelar-editar').addEventListener('click', function() {
    window.location.href = '/meu-canal';
});
</script>
     
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
    
<script>
    const textarea = document.querySelector('.descricao');

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'; // Redefinir a altura para auto
        this.style.height = (this.scrollHeight) + 'px'; // Ajustar a altura do textarea
    });
</script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
             <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
             <script src="/assets/js/script.min.js?h=7943ac0cdc1b9005d36ad60ce20571b3"></script>
</body
@endsection
