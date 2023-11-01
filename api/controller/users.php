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
    } else 
    if ($method == 'POST') {
        if ($acao == '' && $param == '') {
            $response = ['ERRO' => 'Caminho não encontrado'];
        }

        if ($acao == 'cadastrar' && $param == '') {
            $sql = "INSERT INTO users (";

            $contador = 1;

            foreach (array_keys($_POST) as $indice) {
                if (count($_POST) > $contador) {
                    $sql .= "{$indice},";
                } else {
                    $sql .= "{$indice}";
                }
                $contador++;
            }

            $sql .= ") VALUES (";

            $contador = 1;

            foreach (array_values($_POST) as $valor) {
                if (count($_POST) > $contador) {
                    $sql .= "'{$valor}',";
                } else {
                    $sql .= "'{$valor}'";
                }
                $contador++;
            }

            $sql .= ")";

            // esse método instancia o objeto e já chama a função Connect
            $data = DB::Connect();
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