<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="VideoVerse/resources/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background: #1A1818;">
    <header class="p-sm-5 p-4" style="margin: -26px;margin-top: -38px;margin-left: 0px;margin-right: 0px;">
        <div class="row">
            <div class="col-xl-2"> 
                <img src="{{ asset('Video.png') }}" alt="Logo" width="120" height="130" style="height:100px;width:130px;">
            </div>
            <div class="col-xl-8">
                <input type="text" id="caixaDePesquisa" class="caixadebusca" placeholder="Pesquisar..." autocomplete="on" style="border-radius: 10.166px;border: 1.017px solid rgba(255, 255, 255, 0.10);background: #323232;width: 850px;color: rgb(255,255,255);height: 30px;margin-left: 180px;margin-top: 1rem;">
            </div>
            <div class="col">
                <div>
                <button class="btn btn-primary" type="button" style="width: 120px;height: 40px;margin-top: 1rem;margin-left: 7rem;">Entrar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 offset-xl-0">
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 36px;color: #8997a9;background: rgba(211,211,211,0);">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21 8.77217L14.0208 1.79299C12.8492 0.621414 10.9497 0.621413 9.77817 1.79299L3 8.57116V23.0858H10V17.0858C10 15.9812 10.8954 15.0858 12 15.0858C13.1046 15.0858 14 15.9812 14 17.0858V23.0858H21V8.77217ZM11.1924 3.2072L5 9.39959V21.0858H8V17.0858C8 14.8767 9.79086 13.0858 12 13.0858C14.2091 13.0858 16 14.8767 16 17.0858V21.0858H19V9.6006L12.6066 3.2072C12.2161 2.81668 11.5829 2.81668 11.1924 3.2072Z" fill="currentColor"></path>
                            </svg>
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
                                                                    <i class="fa fa-user-o"></i>
                                                                    <a class="menulateral" href="#account" style="font-size: 20px;margin-left: 1rem;color: rgb(255,255,255);">Conta</a>
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
            <div class="col">
                <!-- Start: 1 Row 3 Columns -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" style="height: 200px;"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <!-- End: 1 Row 3 Columns -->
                <!-- Start: 1 Row 3 Columns -->
                <div class="container" style="margin-top: 2rem;">
                    <div class="row">
                        <div class="col-md-4" style="height: 200px;"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <!-- End: 1 Row 3 Columns -->
                <!-- Start: 1 Row 3 Columns -->
                <div class="container" style="margin-top: 2rem;">
                    <div class="row">
                        <div class="col-md-4" style="height: 200px;"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <!-- End: 1 Row 3 Columns -->
            </div>
        </div>
       
        <div class="container" style="margin-top: 2rem;">
            <div class="row" id="videoList">
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const videoList = document.getElementById('videoList');
    let nextPage = 1;

    function loadVideos() {
        $.getJSON('sua_api_de_videos.php?page=' + nextPage, function (data) {
            data.forEach(function (video) {
                const videoElement = `
                    <div class="col-md-4">
                        <img src="${video.thumbnail}" alt="Thumbnail">
                        <h3>${video.title}</h3>
                        <p>${video.views} visualizações</p>
                        <p>${video.channel}</p>
                        <p>${video.date}</p>
                    </div>
                `;
                $(videoList).append(videoElement);
            });
            nextPage++;
        });
    }

    loadVideos();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            loadVideos();
        }
    });
</script>

    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>