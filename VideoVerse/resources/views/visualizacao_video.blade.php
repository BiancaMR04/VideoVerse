<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet'>
<style>
body {
    font-family: 'Questrial';
    background: #1A1818;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.sidebar {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #1A1818;
  overflow-x: hidden;
  padding-top: 20px;
  margin-top: 30px;
  margin-left: 1rem;
  padding-bottom: 50px;
  padding-top: 50px;
  text-align: left;
  border-radius: 10px;
}

.sidebar a {
  padding: 1px 8px 6px 16px;
  text-decoration: none;
  height: 6%;
  width: 250px;
  font-size: 24px;
  color: white;
  display: flex; /* Adiciona display flex */
  align-items: center; /* Centraliza verticalmente */
  margin-left: 3rem;
}

.sidebar a img {
  margin-right: 10px; /* Adiciona um espaço entre o ícone e o texto */
}

.sidebar a:hover {
  background: linear-gradient(0.25turn, #1A1818, #292525 25%, #2D2B2B , #5D5D5D);
  border-radius: 10px;
}

.sidebar a.active {
  background: linear-gradient(0.25turn, #1A1818, #292525 25%, #2D2B2B, #5D5D5D);
  border-radius: 10px;
}



.video-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.video-container video {
    width: 1000px;
    height: 600px;
}

.video-name {
    margin-top: 20px;
    font-size: 40px;
    color: white;
}

.video-data {
    margin-top: 20px;
    font-size: 18px;
    color: white;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 25px;}
  .sidebar a {font-size: 25px;}
}
</style>
</head>
<body>
    @csrf
<div class="sidebar">
  <a href="#home"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/home--v1.png" alt="home--v1"/>  Home</a>
  <p></p>
  <a href="#services"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/video-playlist.png" alt="home--v1"/> Canais</a>
  <p></p>
  <a href="#clients"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/apple-music.png" alt="home--v1"/> Música</a>
  <p></p>
  <a href="#contact"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/tabletop-radio.png" alt="home--v1"/> Podcasts</a>
  <p></p>
  <a href="#contact"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/graduation-cap.png" alt="home--v1"/> Educação</a>
  <br>
  <a href="#home"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/clock--v1.png" alt="home--v1"/> Recentes</a>
  <p></p>
  <a href="#services"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/hearts.png" alt="home--v1"/></i> Favoritos</a>
  <p></p>
  <a href="#clients"><img width="24" height="24" src="https://img.icons8.com/ios/50/ffffff/bookmark-ribbon--v1.png" alt="home--v1"/></i> Inscrições</a>
</div>

<div class="video-container">
    <video controls autoplay>
        <source src="{{ $caminhoVideo }}" type="video/mp4">
        Seu navegador não suporta o elemento de vídeo.
    </video>

    <div class="video-name">
        {{ $nomeVideo }}
    </div>

    <div class="video-data">
        {{ $dataVideo }}
    </div>
</div>

<form action="/video/{{ $videoId }}/curtir" method="POST">
  @csrf
  <button type="submit">Curtir</button>
</form>

<form action="/video/{{ $videoId }}/comentar" method="POST">
  @csrf
  <input type="text" name="comentario" placeholder="Adicione um comentário">
  <button type="submit">Comentar</button>
</form>



</body>
</html>