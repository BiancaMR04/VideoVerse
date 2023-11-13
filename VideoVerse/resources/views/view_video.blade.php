<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/view_video.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Questrial&display=swap">  
</head>
<body style="background: #1A1818;">
@section('content')
@extends('layouts.upbar')
@extends('layouts.sidebar')

    <div class="container">
        <div class="video-container">
            <?php
            $caminho = asset($video->caminho);
            ?>

            <video id="videoElement" controls autoplay>
                <source src="{{$caminho}}" type="video/mp4">
                Seu navegador não suporta o elemento de vídeo.
            </video>

            <div class="video-info">
                <h1 style="color: white;">{{ $video->titulo }}</h1>
                <button class="like-button">Curtir</button>
                <p id="viewsCount">Publicado em {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }} - {{ $video->visualizacao }} visualizações</p>
                <div class="description-box">
                    <p>{{ $video->descricao }}</p>
                </div>
                <div class="channel-info">
                    <img src="{{ asset('uploads/' . $video->canal->imagem_perfil) }}" alt="Imagem de Perfil" class="channel-avatar">
                    <p class="channel-name">{{ $video->canal->nome }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="comment-container">
            <h2 style="color:white;">{{ $video->comments()->count() }} comentários</h2>

            <form action="{{ route('comment.store', $video) }}" method="POST">
                @csrf
                <textarea class="leave-comment" name="body" rows="1" placeholder="Deixe um comentário"></textarea>
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button class="comment-button" type="submit">Comentar</button>
            </form>


            @foreach ($comments as $comment)
                <div class="comment">
                <p class="comment-content">
                    <img src="{{ asset('uploads/' . $comment->user->canal->imagem_perfil) }}" alt="Imagem de Perfil" class="channel-avatar">
                    <span class="comment-username">{{ $comment->user->canal->nome }}</span>
                    <span class="comment-details">
                        comentou em {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}
                    </span>
                </p>
                    <div>
                        <p style="color: white;">{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

        <script>
            const video = document.getElementById('videoElement');
            let viewed = false;

            video.addEventListener('timeupdate', function() {
                if (video.currentTime >= 10 && !viewed) {
                    viewed = true;

                    fetch('/updateViewCount/{{ $video->id }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    }).then(response => {
                        document.getElementById('viewsCount').textContent = '{{ $video->views + 1 }} visualizações';
                    }).catch(error => {
                        console.error('Error updating view count:', error);
                    });
                }
            });
        </script>

<script>
    const textarea = document.querySelector('.leave-comment');

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'; // Redefinir a altura para auto
        this.style.height = (this.scrollHeight) + 'px'; // Ajustar a altura do textarea
    });
</script>
</body>
@endsection