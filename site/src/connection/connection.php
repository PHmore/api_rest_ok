<?php

namespace Connections;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


Class Connection {

    // a função api espera três coisas, a url onde será feita a requisição, o método esperado e o json que a api espera
    // após isso a função curl nativa do php é usada para configurar tudo necessário.
    public static function Api ($url, $method, $data) {

        // inicia o curl para conseguir fazer requisição para a api
        $require = curl_init ();

        // define qual é a url destino da api (chamada de end point) que receberá a requisição
        curl_setopt ($require, CURLOPT_URL, $url);

        // aqui estamos falando que esperamos uma resposta da api
        curl_setopt ($require, CURLOPT_RETURNTRANSFER, true);

        // aqui definiremos o que mandaremos para a api, no caso o json
        curl_setopt ($require, CURLOPT_POSTFIELDS, $data);

        // aqui definimos um cabeçalho falando que o conteúdo que estamos mandando é um json
        curl_setopt ($require, CURLOPT_HTTPHEADER, array (
            "Content-Type: application/json"
        ));

        // aqui definimos o último parametro do curl que é qual método queremos. Dependendo do que está no $method o switch case define qual o método da requisição
        switch ($method) {

            case "post" : 
                curl_setopt($require, CURLOPT_POST, 1);
                break;
            

            case "get" : 
                curl_setopt($require, CURLOPT_HTTPGET, 1);
                break;
                
            
            default : 

                echo ("método não existe");
                break;
        }

        // aqui executamos o curl e devolvemos a resposta
        $response = curl_exec ($require);

        return $response;
    }
    
}


/*
class api {
    public static function connect_api($secao, $acao, $param, $metodo,$dados) {
        $url = "https://localhost/api_erro/api/{$secao}/{$acao}/{$param}";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        if ($metodo == 'POST') {
            $url = "https://localhost/api_erro/api/{$secao}/{$acao}";
            curl_setopt($curl, CURLOPT_POST, true);
            // Adicione os dados que você deseja enviar por POST, se houver algum
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($dados));
        }

        $response = curl_exec($curl);

        if ($response === false) {
            echo "Erro ao fazer a requisição.";
        } else {
            $data = json_decode($response, true);

            if ($data !== null) {
                echo json_encode($data, JSON_PRETTY_PRINT);
            } else {
                echo "Erro ao decodificar o JSON.";
            }
        }

        curl_close($curl);
    }
}
*/
?>