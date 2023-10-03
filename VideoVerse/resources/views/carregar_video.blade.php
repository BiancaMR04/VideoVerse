<!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>
</head>
<body>
    <h1>Upload Video</h1>
    <form action="/videos.upload" method="POST" enctype="multipart/form-data">
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
            
            @foreach ($categorias as $categoria)
            <input type="checkbox" id="categoria1" class=categoria name="categorias" value="{{ $categoria->id }}">
            <label style="color:black" for="categoria1">{{ $categoria->name }}</label>
            @endforeach

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
