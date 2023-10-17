<!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>
    <link rel="stylesheet" href="{{ asset('css/carregar_video.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/carregar_video.js') }}"></script>
    
</head>
<body>
    <h1>Upload Video</h1>
    <form action="/videos.upload" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="view">
            <label for="video">Vídeo (MP4):</label>
            <div class= "video-preview">
            <video id="preview_video" width="620" height="400" controls ></video>
            <input type="file" name="video" id="video" accept="video/mp4" required><br>

            <label for="image">Miniatura (JPG, JPEG, PNG):</label>
            <label for="foto-video" style="cursor: pointer;">
            <img id="preview_foto" style="width: 320px; height: 200px; border: 2px solid black; margin-top: 2em; margin-top: -10px;" src="{{ asset('images.jpeg') }}">
            <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png" required><br>
        </div>  
        <div class="formulario">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            
            <label class="form-label">Categoria(s) do Vídeo</label>
            
            @foreach ($categorias as $categoria)
            <input type="checkbox" id="categoria1" class=categoria name="categorias" value="{{ $categoria->id }}">
            <label style="color:black" for="categoria1">{{ $categoria->name }}</label>
            @endforeach

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
