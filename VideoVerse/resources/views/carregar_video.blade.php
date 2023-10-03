<!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>
</head>
<body>
    <h1>Upload Video</h1>
    <form action="{{ route('videos.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="video">Vídeo (MP4):</label>
        <input type="file" name="video" id="video" accept="video/mp4" required><br>

        <label for="image">Miniatura (JPG, JPEG, PNG):</label>
        <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png" required><br>

        <div class="formulário">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            
            <label class="form-label">Categoria(s) do Vídeo</label>
                    
            <input type="checkbox" id="categoria1" class=categoria name="categorias[]" value="categoria1">
            <label for="categoria1">Animação</label>
                    
            <input type="checkbox" id="categoria2" class=categoria name="categorias[]" value="categoria2">
            <label for="categoria2">Jogos</label>
                
            <input type="checkbox" id="categoria3" class=categoria name="categorias[]" value="categoria3">
            <label for="categoria3">Educação</label>
                
            <input type="checkbox" id="categoria4" class=categoria name="categorias[]" value="categoria4">
            <label for="categoria4">Entreterimento</label>
                
            <input type="checkbox" id="categoria5" class=categoria name="categorias[]" value="categoria5">
            <label for="categoria5">Música</label>

            <input type="checkbox" id="categoria6" class=categoria name="categorias[]" value="categoria6">
            <label for="categoria6">Podcast</label>
                    
            <input type="checkbox" id="categoria7" class=categoria name="categorias[]" value="categoria7">
            <label for="categoria7">Cúlinaria</label>
    
            <input type="checkbox" id="categoria8" class=categoria name="categorias[]" value="categoria8">
            <label for="categoria8">Saúde</label>
    
            <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
            <label for="categoria9">Vlogs</label>
        
            <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
            <label for="categoria9">Notícias</label>
        
            <input type="checkbox" id="categoria9" class=categoria name="categorias[]" value="categoria9">
            <label for="categoria9">Infantil</label>
        </div>               

        <input type="submit" value="Enviar">
    </form>
    <!-- Elemento de vídeo -->
    <video controls autoplay>
        <source src="{{ $video->caminho }}" type="video/mp4">
        <!-- Adicione mais sources se desejar oferecer suporte a outros formatos de vídeo -->
        Seu navegador não suporta o elemento de vídeo.
    </video>
    
    <h1>{{ $video->titulo }}</h1>
    <p>{{ $video->canal->nome }}</p>
    <p>{{ $video->visualizacao }} visualizações</p>
    <p>Data de publicação: {{ $video->data }}</p>
</body>
</html>
