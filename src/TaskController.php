<?php
class TaskController {
    private $pdo;

    // Construtor que recebe a conexão PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Obter todas as tarefas
    public function getTasks() {
        // Consulta para obter todas as tarefas
        $stmt = $this->pdo->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Criar uma nova tarefa
    public function createTask($title, $description) {
        // Insere uma nova tarefa no banco com status "Pendente"
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $status = 0; // Padrão para "Pendente"
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    // Atualizar uma tarefa existente
    public function updateTask($id, $title, $description, $status) {
        // Atualiza os dados de uma tarefa com base no ID
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Marcar uma tarefa como concluída
    public function markAsCompleted($id) {
        // Altera o status da tarefa para "Concluída"
        $stmt = $this->pdo->prepare("UPDATE tasks SET status = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Excluir uma tarefa
    public function deleteTask($id) {
        // Exclui a tarefa com base no ID
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Obter uma tarefa específica pelo ID
    public function getTaskById($id) {
        // Retorna a tarefa pelo ID
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
