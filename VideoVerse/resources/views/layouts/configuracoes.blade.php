<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VideoVerse') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
.modal-dialog {
    margin: 0 auto;
}
.modal-footer a {
    text-decoration: none;
    color: black;
}
.option {
    margin-top: 20px;
}
.option a {
    margin-top: 20px;
    color: black;
    text-decoration: none;
}
.option-button {
    padding: 0.7em;
    background-color: white;
    transition: .4s ease-in-out;
    border-radius: 5px;
}
.option-button:hover {
    background-color: #B42DF4;
    text-decoration: none;
}
.option-button-excluir:hover {
    background-color: red;
}
</style>

<body>
    <div class="modal fade" id="configuracoesModal" tabindex="-1" role="dialog" aria-labelledby="configuracoesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="configuracoesModalLabel">Configurações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo das configurações vai aqui -->
                    @if (Auth::user())
                        @if (Auth::user()->canal)
                            <div class="option">
                                <a href="{{ route('view.canal', ['canalId' => Auth::user()->canal->id]) }}" class="option-button">Meu canal</a>
                            </div>
                            <div class="option">
                                <a href="" class="option-button" data-toggle="modal" data-target="#confirmacaoExcluirCanal">Excluir canal</a>
                            </div>
                        @else
                            <div class="option">
                                <a href="{{ route('criar_canal') }}" class="option-button">Criar canal</a>
                            </div>
                        @endif
                    <div class="option">
                        <a href="#" class="option-button" data-toggle="modal" data-target="#confirmacaoExcluirConta">Excluir Conta</a>                    
                    </div>
                    @else
                    @endif
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

<!-- confirmacaoExcluirCanal -->
<div class="modal fade" id="confirmacaoExcluirCanal" tabindex="-1" role="dialog" aria-labelledby="confirmacaoExcluirCanalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacaoExcluirCanalLabel">Excluir canal?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (Auth::user()->canal)
                <div class="modal-body">
                    Tem certeza de que deseja excluir seu canal?<br>
                    Ao confirmar, o canal {{ Auth::user()->canal->nome }} será excluído permanentemente, <br>
                    Os seus vídeos associados à esse canal também serão excluidos e você não poderá recuperá-los, nem sua remuneração.
                </div>
            @endif
            <div class="modal-footer">
                <a href="" class="option-button" data-dismiss="modal">Cancelar</a>
                <a href="{{ route('excluir.canal') }}" class="option-button option-button-excluir">Excluir</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmacaoExcluirConta" tabindex="-1" role="dialog" aria-labelledby="confirmacaoExcluirContaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacaoExcluirContaLabel">Excluir conta?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir sua conta?
            </div>
            <div class="modal-footer">
                <a href="" class="option-button" data-dismiss="modal">Cancelar</a>
                <a href="" class="option-button option-button-cancelar">Confirmar</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
