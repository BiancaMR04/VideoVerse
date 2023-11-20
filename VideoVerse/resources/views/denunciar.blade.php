<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Denúnciar Vídeo</title>
    <link rel="stylesheet" href="VideoVerse/resources/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/denunciar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')
<div class="report-modal" id="reportModal">
    <div class="modal-content">
        <h2>Denunciar Vídeo</h2>
        <form action="denuncia_concluida" method="post" id="reportForm">
            @csrf
            <label>Motivo da Denúncia:</label><br>
            <input type="radio" id="conteudo-sexual" name="reason" value="conteudo-sexual">
            <label for="conteudo-sexual">Conteúdo Sexual</label><br>
            <input type="radio" id="violento-repulsivo" name="reason" value="violento-repulsivo">
            <label for="violento-repulsivo">Conteúdo Violento ou Repulsivo</label><br>
            <input type="radio" id="odio-discurso" name="reason" value="odio-discurso">
            <label for="odio-discurso">Discurso de Ódio</label><br>
            <input type="radio" id="spam" name="reason" value="spam">
            <label for="spam">Spam</label><br>
            <input type="radio" id="engana-pessoas" name="reason" value="engana-pessoas">
            <label for="engana-pessoas">Engana Pessoas</label><br>
            <input type="radio" id="outro" name="reason" value="outro">
            <label for="outro">Outro</label><br>

            <label for="details">Detalhes (opcional):</label><br>
            <textarea name="details" id="details" rows="4"></textarea><br>

            <button type="submit">Enviar Denúncia</button>
        </form>
    </div>
</div>
@endsection
</body>

</html>