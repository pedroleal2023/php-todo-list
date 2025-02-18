<?php
$host = "127.0.0.1";   // Use 127.0.0.1 ou localhost
$port = "3307";        // Especificando a porta correta
$dbname = "todo_list"; // Nome do banco de dados
$username = "root";    // Usuário do banco
$password = "";        // Senha (ajuste se necessário)

try {
    // Conectando ao banco usando a porta correta
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
