<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Cadastro de Canal</title>
        <link rel="stylesheet" href="VideoVerse/resources/css/styles.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .form {
                display: flex;
                flex-direction: column;
                gap: 10px;
                padding-left: 2em;
                padding-right: 2em;
                padding-bottom: 0.4em;
                background-color: #171717;
                border-radius: 25px;
                transition: .4s ease-in-out;
            }
    
            .form:hover {
                transform: scale(1.05);
                border: 1px solid #B42DF4;
            }
    
            .form .card-header {
                background-color: #171717;
                color: white;
                border: none;
            }
    
            .form .form-group {
                margin-bottom: 1rem;
            }
    
            .form label {
                color: white;
            }
    
            /* Alinhe os campos à esquerda */
            .form .form-control {
                background: none;
                border: none;
                border-radius: 25px;
                color: #d3d3d3;
                text-align: left; /* Alinhe à esquerda */
            }
    
            /* Estilize a cor do placeholder */
            .form .form-control::placeholder {
                color: #999; /* Cor de destaque personalizada */
            }
    
            .form .btn {
                padding: 0.5em;
                border-radius: 5px;
                border: none;
                outline: none;
                transition: .4s ease-in-out;
                background-color: #252525;
                color: white;
            }
    
            .form .btn:hover {
                background-color: #B42DF4;
                color: white;
            }
            .form .form-control{
                background-color: #212020;
            }
            .card-header {
                text-align: center;
                font-size: 125%;
                color: #B42DF4;
            }
            .btn1{
                padding: 0.5em;
                border-radius: 5px;
                border: none;
                transition: .4s ease-in-out;
                background-color: #252525;
                color: white;
            }
            .btn1:hover{
                background-color: #e00000;
                color: white;
            }

            

            
        </style>
    </head>
    <body style="background: #1A1818;">
        <header class="p-sm-5 p-4" style="margin: -26px;margin-top: -38px;margin-left: 0px;margin-right: 0px;">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card form">
                            <div class="card-header">Cadastro de Canal</div>
                            <div class="card-body">
                                <!--<form method="POST" action="processar_criacao_canal.php" enctype="multipart/form-data">
                                    Adicione campos extras -->
                                    <div class="form-group">
                                        <label for="nomecanal">Nome do Canal</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do canal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" placeholder="Insira a descrição do canal" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagem">Imagem do Canal</label>
                                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagemCapa">Imagem de Capa do Canal</label>
                                        <input type="file" class="form-control" id="imagemCapa" name="imagemCapa" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn">Criar Canal</button>
                                    <button type="Sair" class="btn1">Sair</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>