<?php
require_once "../src/config.php"; // Conexão com o banco
require_once "../src/TaskController.php"; // Importa o controlador de tarefas

$taskController = new TaskController($pdo); // Instancia o controlador

// Obtém todas as tarefas
$tasks = $taskController->getTasks();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Minha To-Do List</h1>

        <!-- Formulário para criar nova tarefa -->
        <form action="create_task.php" method="POST">
            <input type="text" name="title" placeholder="Título da Tarefa" required>
            <textarea name="description" placeholder="Descrição (opcional)"></textarea>
            <button type="submit">Adicionar Tarefa</button>
        </form>

        <h2>Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                    <td><?php echo $task['status'] == 1 ? 'Concluída' : 'Pendente'; ?></td>
                    <td>
                        <!-- Botões de Ação -->
                        <a href="edit_task.php?id=<?php echo $task['id']; ?>">Editar</a> |
                        <a href="mark_completed.php?id=<?php echo $task['id']; ?>">Marcar como Concluída</a> |
                        <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Você tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
