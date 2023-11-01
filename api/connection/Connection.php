<?php

class Connection
{
    public static function connect(){
        $host = "localhost";
        $dbname = "api_php";//Insira aqui nome do banco de dados 
        $user = "root"; //Isira aqui seu nome de usuário;
        $password = ""; //Insira aqui sua senha;
        
        return new PDO("mysql:host={$host};dbname={$dbname};charset=UTF8;",$user, $password);
    }
}
?>