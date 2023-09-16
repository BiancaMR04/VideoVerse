<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se todos os campos do formulário estão preenchidos
    if (empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["senha"]) || empty($_POST["data_nascimento"])) {
        // Pelo menos um campo está em branco
        echo 'Por favor, preencha todos os campos do formulário.';
    } else {
        // Todos os campos estão preenchidos, você pode prosseguir com o processamento

        // Recupere os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $data_nascimento = $_POST["data_nascimento"];

        // Verifique se o email já existe (substitua com sua própria lógica)
        // Aqui, usaremos um exemplo de email já existente
        $emailExistente = "exemplo";
        if ($email == $emailExistente) {
            $mensagemErro = "Este email já está cadastrado.";
        } else {
            // Prossiga com a inserção dos dados no banco de dados ou outra ação desejada
            // Lembre-se de adicionar código de segurança e validação adequados
            $mensagemSucesso = "Cadastro realizado com sucesso!";
        }
    }
} else {
    $mensagemErro = "Acesso não autorizado.";
}
?>
