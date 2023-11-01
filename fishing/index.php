<?php
    $url = $_SERVER["REQUEST_URI"];

    switch ($url) {
        case '/api_rest_ok/fishing/':
            header("Location: ./src/view/Tela.php");
            break;
        
        default:
            echo "Página não encontrada";
            break;
    }
?>