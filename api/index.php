<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Acess-Control-Allow-Origin: *');
header('Content-type: application/json');

$url = $_SERVER ["REQUEST_URI"];

$dados = file_get_contents("php://input");
$data = json_decode($dados);
//var_dump($url);

if(isset($_GET['path'])){
    
    $path = explode("/", $_GET['path']);

} else {echo "Caminho não existe"; exit;}

if(isset($path[0])){$api = $path[0];} else {echo "Caminho não existe";}
if(isset($path[1])){$acao = $path[1];} else {$acao="";}
if(isset($path[2])){$param = $path[2];} else {$param="";}

$method = $_SERVER['REQUEST_METHOD'];

//é necessário ter atenção com a ordem das coisas pois a conexão é feita antes
include_once "connection/Connection.php";
include_once "controller/users.php";

echo $response;
?>