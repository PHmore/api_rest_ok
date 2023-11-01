<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// aqui se ocorrer um post criamos um objeto da controller e chamamos a função passando os campos desejados

if ($_POST) {
    require_once "connection/connection.php";
    require_once "controller/ApiControl.php";
    $user = new UserController ();

    $user = $user -> cadastrar ($_POST ["nome"] , $_POST ["senha"]);
    echo ($user);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro e Listagem</title>
</head>
<body>

    <h1>Cadastro de Usuário</h1>

    <!-- Formulário para cadastrar por POST -->
    <form  method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <input type="submit" value="Cadastrar">
    </form>

    <h1>Listagem de Usuário</h1>

    <!-- Formulário para listar por GET -->
    <form method="get">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <input type="submit" value="Listar">
    </form>

</body>
</html>
