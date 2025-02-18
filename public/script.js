/*document.addEventListener("DOMContentLoaded", function () {
  // 1. Efeito de marcar tarefa como concluída
  const taskStatusElements = document.querySelectorAll(".task-status");

  taskStatusElements.forEach((status) => {
    status.addEventListener("click", function () {
      const taskRow = this.closest("tr"); // Pega a linha da tarefa
      taskRow.classList.toggle("completed");

      // Simula a marcação como concluída com um pequeno delay
      setTimeout(() => {
        alert("Tarefa marcada como concluída!");
        // Aqui você pode fazer um AJAX ou chamada para seu backend para atualizar o status no banco
      }, 300);
    });
  });

  // 2. Efeito de exclusão de tarefa com confirmação
  const deleteButtons = document.querySelectorAll(".delete-btn");
  deleteButtons.forEach((btn) => {
    btn.addEventListener("click", function (event) {
      event.preventDefault(); // Previne a navegação imediata
      const taskRow = this.closest("tr"); // Pega a linha da tarefa

      // Confirmar exclusão
      const confirmDelete = confirm(
        "Você tem certeza que deseja excluir esta tarefa?"
      );
      if (confirmDelete) {
        taskRow.classList.add("deleting"); // Adiciona uma animação de "remover"
        setTimeout(() => {
          taskRow.remove(); // Remove a linha da tabela após a animação
          alert("Tarefa excluída!");
          // Aqui você pode fazer um AJAX ou chamada para seu backend para excluir a tarefa do banco
        }, 500); // Tempo para a animação
      }
    });
  });

  // 3. Feedback de adição de tarefa (usando um modal ou mensagem de confirmação)
  const addTaskForm = document.querySelector("form");
  if (addTaskForm) {
    addTaskForm.addEventListener("submit", function (event) {
      event.preventDefault(); // Previne o envio do formulário para fins de demonstração

      const titleInput = addTaskForm.querySelector('input[name="title"]');
      const descriptionInput = addTaskForm.querySelector(
        'textarea[name="description"]'
      );

      // Aqui você pode validar o formulário
      if (titleInput.value.trim() === "") {
        alert("Por favor, insira um título para a tarefa.");
        return;
      }

      // Simula a criação de uma nova tarefa
      const newTask = document.createElement("tr");
      newTask.innerHTML = `
              <td>${titleInput.value}</td>
              <td>${descriptionInput.value}</td>
              <td class="task-status">Pendente</td>
              <td>
                  <a href="#" class="edit-btn">Editar</a> |
                  <a href="#" class="delete-btn">Excluir</a>
              </td>
          `;
      document.querySelector("table tbody").appendChild(newTask);

      // Limpa o formulário após adicionar a tarefa
      titleInput.value = "";
      descriptionInput.value = "";
      alert("Tarefa adicionada com sucesso!");
    });
  }

  // 4. Estilizar as tarefas com animações de conclusão
  const completedTasks = document.querySelectorAll(".completed");
  completedTasks.forEach((task) => {
    task.style.textDecoration = "line-through"; // Risca o texto de tarefas concluídas
    task.style.color = "gray"; // Muda a cor para sinalizar que está concluída
  });
});
*/
