<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = []; // Inicializa a variável de resposta

if ($api == 'users') {

    if ($method == "GET") {
        if ($acao == 'listar' && $param == '') {
            try {
                $db = DB::connect();
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
                $db = DB::connect();
                $rs = $db->prepare("SELECT * FROM users WHERE user_id = {$param}");
                $rs->execute();
                $obj = $rs->fetchObject();

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
    }

}
// Finalmente, retorna a resposta como JSON
$response = json_encode($response, JSON_PRETTY_PRINT);
?>