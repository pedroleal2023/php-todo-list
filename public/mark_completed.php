<?php
require_once "../src/config.php"; // Conexão com o banco
require_once "../src/TaskController.php"; // Controlador de tarefas

// Pega o ID da tarefa da URL
$id = $_GET['id'];

// Cria uma instância do controlador
$taskController = new TaskController($pdo);

// Marca a tarefa como concluída
$taskController->markAsCompleted($id);

// Redireciona de volta para a página principal
header("Location: index.php");
exit();
?>
