<?php
namespace Controllers;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once ("vendor/autoload.php");
use Connections\Connection;

      class UserController {

        public static function cadastrar ($email , $password) {
            $api = new Connection ();
    
            // definimos a url de destino da api
            $url = "https://localhost/api_erro/api/users/cadastrar";
    
            // aqui montamos o nosso objeto json
            $data = [
                "email" => $email,
                "password" => $password
            ];
            $data = json_encode ($data);
    
            // aqui definimos o método desejado
            $method = "post";
    
            // aqui chamamos a função que está na connection e devolvemos a resposta para a view
            // Poderiamos nessa etapa criptografar a resposta com o jwt e guardar ele numa sessão de usuário $_SESSION
            $response = $api -> Api ($url, $method, $data);
            return $response;
        }
    
    }
    
?>