<?php
class UserModel {
    function cadastrarItem($nome, $senha){
        require_once '../connection/Connection.php';
        $conn = new Connection();
        $conn = $conn->connect();

        

        // Prepare a declaração SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)");
        
        // Substitua os marcadores de posição pelos valores
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);

        // Execute a declaração
        $resultado = $stmt->execute();

        // Feche a conexão
        $conn = null;

        return $resultado;
    }

    function listar(){
        require_once '../connection/Connection.php';
        $conn = new Connection();
        $conn = $conn->connect();

        // Prepare a declaração SQL
        $stmt = $conn->prepare("SELECT nome, senha FROM usuarios");

        // Execute a declaração
        $stmt->execute();

        // Obtenha os resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Feche a conexão
        $conn = null;

        return $resultado;
    }
}
?>
