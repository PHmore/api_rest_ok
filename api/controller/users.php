<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = []; // Inicializa a variável de resposta

if ($api == 'users') {

    if ($method == "GET") {
        if ($acao == 'listar' && $param == '') {
            try {
                $db = Connection::connect();
                $rs = $db->prepare("SELECT * FROM users ORDER BY user_id");
                $rs->execute();
                $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

                if ($obj) {
                    $response = ["dados" => $obj]; // Não precisa de json_encode aqui
                } else {
                    $response = ["dados" => 'Não existem dados para retornar'];
                }

            } catch (PDOException $e) {
                $response = ['ERRO' => 'Erro de conexão: ' . $e->getMessage()];
            }

        } else if ($acao == 'listar' && $param != '') {
            try {
                $db = Connection::connect();
                $rs = $db->prepare("SELECT * FROM users WHERE user_id = {$param}");
                $rs->execute();
                $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

                if ($obj) {
                    $response = ["dados" => $obj]; // Não precisa de json_encode aqui
                } else {
                    $response = ["dados" => 'Não existem dados para retornar'];
                }

            } catch (PDOException $e) {
                $response = ['ERRO' => 'Erro de conexão: ' . $e->getMessage()];
            }

        } else {
            $response = ['ERRO' => 'Caminho não encontrado'];
        }
    } else 
    if ($method == 'POST') {
        if ($acao == '' && $param == '') {
            $response = ['ERRO' => 'Caminho não encontrado'];
        }

        if ($acao == 'cadastrar' && $param == '') {
                $data = json_decode(file_get_contents('php://input'), true);
    
                $nome = $data['nome'];
                $senha = $data['senha'];
    
                //$user = $user->cadastrarItem($nome, $senha);
            $sql = "INSERT INTO users (nome,senha) VALUES ('$nome','$senha')";

            // esse método instancia o objeto e já chama a função Connect
            $data = Connection::Connect();
            $result = $data->prepare($sql);
            $exec = $result->execute();

            if ($exec) {
                $response = ["dados" => 'Dados foram inseridos com sucesso'];
            } else {
                $response = ["dados" => 'Não foi possível inserir os dados'];
            }
        } else {
            $response = ['ERRO' => 'Caminho não encontrado'];
        }
    }

}
// Finalmente, retorna a resposta como JSON
$response = json_encode($response, JSON_PRETTY_PRINT);
?>