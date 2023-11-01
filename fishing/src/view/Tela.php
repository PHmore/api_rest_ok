<?php
    require_once "../controller/UserController.php";

    if (isset($_POST["btn-cadastrar"])){
        $user = new UserController();
        $resultado = $user->cadastro($_POST["nome"],  $_POST["senha"]);
        $dados = json_decode($resultado,true);
        echo $dados["dados"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Listagem de users</title>
</head>
<body>
    <div class="main">
        <div class="main-content-cadastro">
            <h2>Cadastro</h2>
            <form method="POST">
                <label for="nome">Nome</label>
                <input type="text" placeholder="Digite seu nome..." name="nome" required>
                <br>

                <label for="nome">Senha</label>
                <input type="password" placeholder="Digite sua senha..." name="senha" required>

                <button name="btn-cadastrar">Cadastrar</button>
            </form><br>
        </div>
        <div class="main-content-listagem">
            <form method="POST">
                <label for="id">ID (opcional)</label>
                <input type="text" placeholder="Digite o ID..." name="id">
                <button name="btn-lista-itens">Listar Itens</button><br><br>
                <table class="lista-itens">
                    <?php
                     if (isset($_POST["btn-lista-itens"])){
                        require_once '../controller/UserController.php';
                        $user = new UserController();
                        $itens = $user->listar($_POST['id']);
                        $dados = json_decode($itens, true);

                        //var_dump($dados);

                        if ($dados){

                            if (isset($dados["dados"]) && is_array($dados["dados"])) {
                                foreach ($dados['dados'] as $user) {
                                    echo "ID: " . $user['user_id'] . "<br>";
                                    echo "Nome: " . $user['nome'] . "<br>";
                                    echo "Senha: " . $user['senha'] . "<br>";
                                    echo "<br>";
                                }
                            } else if (isset($dados["dados"]) && is_string($dados["dados"]))
                            {echo $dados["dados"];}else
                             {
                                echo "Nenhum dado disponível.";
                            }
                        }
                        elseif (!$dados)
                            echo "Não há nenhum registro no Banco de Dados";
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>