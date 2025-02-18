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
    $status = isset($_POST['status']) ? 1 : 0; // Concluída ou Pendente

    // Atualiza a tarefa
    $taskController->updateTask($id, $title, $description, $status);

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

            <label for="status">Status:</label>
            <input type="checkbox" name="status" id="status" <?php echo $task['status'] == 1 ? 'checked' : ''; ?>>
            <label for="status">Concluída</label>

            <button type="submit">Salvar Alterações</button>
        </form>

        <a href="index.php">Voltar para a lista de tarefas</a>
    </div>
</body>
</html>
