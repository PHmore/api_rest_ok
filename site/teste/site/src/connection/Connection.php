<?php 

namespace Connections;

Class Connection {

    // A função 'Api' espera três parâmetros: a URL para a requisição, o método esperado e os dados em formato JSON.
    // Em seguida, a função nativa do PHP 'curl' é usada para configurar tudo o que é necessário.
    function Api ($url, $method, $data) {

        // Inicializa o cURL para permitir a realização da requisição à API.
        $require = curl_init ();

        // Define a URL de destino da API (chamada de endpoint) que receberá a requisição.
        curl_setopt ($require, CURLOPT_URL, $url);

        // Aqui estamos indicando que esperamos uma resposta da API.
        curl_setopt ($require, CURLOPT_RETURNTRANSFER, true);

        // Aqui definimos o que será enviado para a API, no caso o JSON.
        curl_setopt ($require, CURLOPT_POSTFIELDS, $data);

        // Aqui definimos um cabeçalho indicando que o conteúdo enviado é um JSON.
        curl_setopt ($require, CURLOPT_HTTPHEADER, array (
            "Content-Type: application/json"
        ));

        // Aqui definimos o último parâmetro do cURL, que é o método que queremos. Dependendo do que está em $method, o switch case define qual será o método da requisição.
        switch ($method) {

            case "post" : 

                curl_setopt ($require, CURLOPT_POST, 1);
                break;

            case "get" : 

                curl_setopt($require, CURLOPT_HTTPGET, true);
                break;
            
            default : 

                echo ("Método não existe");
                break;
        }

        // Aqui executamos o cURL e retornamos a resposta.
        $response = curl_exec ($require);

        return $response;
    }
    
}
?>
