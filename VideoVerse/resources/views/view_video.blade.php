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

            <video id="videoElement" data-update-url="{{ route('updateViewCount', ['id' => $video->id]) }}" controls autoplay>
                <source src="{{$caminho}}" type="video/mp4">
                Seu navegador não suporta o elemento de vídeo.
            </video>

            <div class="video-info">
                <h1 style="color: white;">{{ $video->titulo }}</h1>
                @csrf
                @guest
                    <button id="curtirButtonDeslogado" type="button" onclick="redirecionarParaLogin()" class="like-button">
                        Curtir {{ $video->likes }}
                    </button>
                @else
                    <button id="curtirButton" type="submit" class="like-button @if(auth()->user()->likedVideos->contains($video->id)) curtido @endif">
                    @if(auth()->user()->likedVideos->contains($video->id))    
                        Curtido {{ $video->likes }}
                    @else
                        Curtir {{ $video->likes }}
                    @endif
                    </button>
                @endif
                <button class="btn-denunciar">
                <a href="{{ route('denuncia.motivo', ['id' => $video->id ]) }}">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAELklEQVR4nO1ZW4gcVRAtM7d6Zn1HUSJqFJ/4QhQURUUUQT98fOhHTEAhohD0Q3/yY2SDIqgo8fGhgv4oKDaZrtuTMSoiSwwKSogoLkEQMdH4IPh2Z7ruaK7c3prsZmdmp7unJzMte+DC0Leq+py5favrVgMsYQnFBBOuZo2roMjgGl7KGv91wwTqcigirIXDWON2o9G6wRo/dtegaGCNa2IBhD+5IWLWQJFga3C4IbVbyK9lwnvilSH1vX0PjoCigAkfE+I77SQsc4MJPxVhj0IR0KDKqUw4I0KuaV83gbqSCfezxkaTyqfDuMOQ8mc3uHqjy9ybMvcWjDNMqK5q/+uNzZXTFs7PVCdOYcK/YzGBuhbGEXYSlhmNO+Qfn+xlx4QbxeYz60MJxg2G8D4h+N1imcn6MGG0+lY2/r0wTrBb4Wgm/FHI9S1HOMA7xfZnS3AsjAuY8Jm0b2/W+KH4PA3jgGZYPosJo7ieqqnLkvqxxkukDjOR9s4dLssEYI1vy954BVLCkHpVypg6jBKtsHSTEPnD1mHFwnnrg2frsDwePngd83VY4XxdDBcLRgH7MqAhtUve4Ou72RhSj7SrX/e7h816md/lYg6deAcBrR6SR+pruxXKi78z4lXb2M3GrZTR6isR8+DQiS+4+XGs8Rd380h7t/aySyLEIQq92ySD/WZ9OGFoxDsIanxJyH2wqF1CIRLzXbF7MXfCXW8Y4gVM2GKN/zDhRXkJibR3vkvFcdwqXpw78Q5yGqfkMXi+r20KIWL/gsTePtRjcaS9O4TUrzaA4/MWYuuwnAn3xXuPvNtzI37QTaagYkh9I5nq/iQ+aYU4mFA9IBlstzsyQ94wWm2QG0wnzfdZhFgfSkarL+QPexjyxMyWiZNZ41/xG5hKNyb1yyLEoRWWrhefmUatshLygiH1uqyGTuOXVYiDIRXKqrwGecCE6go5vnIUeOccKiHNoHxmXFUT7jeBuhpy6BZ+IinxibT+gwhxYI1Piv8Od5SGrOAQ7253C60PxxxqIVbDUazxB/kj70rrPxvEhyMNqb3tbuFAmW72Wd+QJQZrXCv7c6/jlCXA44Muq0vTB84jGUt0O6874zilcm5uLp/BhM14o83rFo4KZq5LydEW7+zkjqSCXt3CUcG0u5SkqokcWrp0XV4vo3lZx8V7apBYjVplZbun7Dj2Lw9Ifd6vW5gUrHHTvA89mwaOR5IFSX1pp0D1NDSBWici9uRRsOUtxLrvLlrtkd7xur4ldF4fL93ng5Yu3eBGt6Z2FrDGVfKo7nOcOw0InxMRH437tz4m3CZinj1oIgq88+SYmapbOCpwu0vpjtxVvHBugvCdrN3CUcHMdSnfjy9E5N0iF/60VTgJCgJbhRNZ4+9xOg5KNztl03P1UEEHqekD7f0iDybcNuonZAn/W/wH5VWPMFFFPgIAAAAASUVORK5CYII=" 
                viewBox="0 0 15 17.5" heissght="20" width="17"class="icone">
                
                  </button>
                <p id="viewsCount">Publicado em {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }} - {{ $video->visualizacao }} visualizações</p>
                <div class="description-box">
                    <p>{{ $video->descricao }}</p>
                </div>
                <div class="channel-info">
                    <a href="{{ route('view.canal', ['canalId' => $video->canal->id]) }}">
                        <img src="{{ asset('uploads/' . $video->canal->imagem_perfil) }}" alt="Imagem de Perfil" class="channel-avatar">
                        <p class="channel-name">{{ $video->canal->nome }}</p>
                    </a>
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
<!-- resources/views/seu_template.blade.php -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#curtirButton').click(function() {
            var video_id = "{{ $video->id }}";

            // Envie uma solicitação Ajax ao servidor para curtir
            $.ajax({
                type: 'POST',
                url: '{{ route("video.like") }}',
                data: { video_id: video_id, _token: '{{ csrf_token() }}' },
                success: function(response) {

                    var likeButton = document.getElementById('curtirButton');
                    if (response.mensagem == "Vídeo curtido com sucesso!") {
                        likeButton.classList.add('curtido'); // Adiciona a classe para indicar que foi curtido
                        document.getElementById('curtirButton').textContent = "Curtido " + response.likes;
                    } else {
                        likeButton.classList.remove('curtido'); // Remove a classe para indicar que foi descurtido
                        document.getElementById('curtirButton').textContent = "Curtir " + response.likes;
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao processar a solicitação Ajax:', error);
                }
            });
        });
    });
</script>


<script>
    const video = document.getElementById('videoElement');
    let viewed = false;

    video.addEventListener('timeupdate', function() {
        if (video.currentTime >= 10 && !viewed) {
            viewed = true;

            const videoId = '{{ $video->id }}';
            const url = '{{ url("updateViewCount") }}/' + videoId;

            fetch('{{ url("updateViewCount/{$video->id}") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            }).then(response => {
                document.getElementById('viewsCount').textContent = "Publicado em {{ \Carbon\Carbon::parse($video->data)->format('d/m/Y') }} - {{ $video->visualizacao + 1 }} visualizações";
            }).catch(error => {
                console.error('Erro ao atualizar número de views:', error);
            });
        }
    });
</script>

<script>
    function redirecionarParaLogin() {
        window.location.href = "{{ route('login') }}";
    }
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