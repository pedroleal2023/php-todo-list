<?php
require_once "../src/config.php"; // Conexão com o banco
require_once "../src/TaskController.php"; // Importa o controlador de tarefas

// Verifica se o ID foi passado via GET
if (!isset($_GET['id'])) {
    die("ID da tarefa não fornecido.");
}

$id = $_GET['id'];

// Cria uma instância do controlador
$taskController = new TaskController($pdo);

// Verifica se a tarefa existe
$task = $taskController->getTaskById($id);

if (!$task) {
    die("Tarefa não encontrada.");
}

// Processa a submissão do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Atualiza a tarefa (não modificamos o status aqui, já que o status não deve ser alterado na edição)
    $taskController->updateTask($id, $title, $description, $task['status']); // Mantém o status como estava

    // Redireciona para a página principal após a atualização
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarefa</h1>

        <form action="edit_task.php?id=<?php echo $task['id']; ?>" method="POST">
            <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required placeholder="Título da Tarefa">
            <textarea name="description" placeholder="Descrição (opcional)"><?php echo htmlspecialchars($task['description']); ?></textarea>

            <button type="submit">Salvar Alterações</button>
        </form>

        <a href="index.php" class="back-button">Voltar para a lista de tarefas</a>
    </div>
</body>
</html>
