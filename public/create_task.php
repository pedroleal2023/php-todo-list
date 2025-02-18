<?php
require_once "../src/config.php"; // Conexão com o banco
require_once "../src/TaskController.php"; // Importa o controlador de tarefas

$taskController = new TaskController($pdo); // Instancia o controlador

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'] ?? ''; // Descrição pode ser opcional

    // Validação do título
    if (empty($title)) {
        echo "<script>alert('O título da tarefa é obrigatório!');</script>";
    } else {
        $taskController->createTask($title, $description); // Cria a tarefa
        header("Location: index.php"); // Redireciona de volta para a página inicial
        exit;
    }
}
?>
