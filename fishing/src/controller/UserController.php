<?php
    class UserController {
        function cadastro($nome, $senha) {
            require_once '../connection/Connection.php';
            $api = new Connection();

            $url = "http://localhost/api_rest_ok/api/users/cadastrar";

            $data = [
                "nome" => $nome,
                "senha" => $senha
            ];

            $data = json_encode($data);
            $method = "post";

            $resposta = $api->Api($url, $method, $data);
            return $resposta;
        }
        
        function listar($id){
            require_once '../connection/Connection.php';
            $api = new Connection();

            if($id == ""){
            $url = "http://localhost/api_rest_ok/api/users/listar";
            } else {
                $url = "http://localhost/api_rest_ok/api/users/listar/".$id;
            }
            $data = NULL;
            $method = "get";

            //var_dump($id);

            $resposta = $api->Api($url, $method, $data);
            return $resposta;
        }
    }
?>