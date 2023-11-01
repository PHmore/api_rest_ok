<?php 

use Controllers\UserController;

// aqui se ocorrer um post criamos um objeto da controller e chamamos a função passando os campos desejados

if ($_POST) {
    $user = new UserController ();

    $user = $user -> cadastro (1, 2);
    echo ($user);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="cadastrar">
    </form>

    <h1>Busca</h1>
    <form method="get">
        <label for="buscaNome">Buscar por Nome:</label>
        <input type="text" id="buscaNome" name="buscaNome"><br><br>
        
        <input type="submit" value="Buscar">
    </form>
</body>
</html>
