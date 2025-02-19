 To-Do List
 
- Descrição

Este é um projeto de uma aplicação web de lista de tarefas (To-Do List) desenvolvido como parte de um desafio para estágio em desenvolvimento PHP Full-Stack. 
A aplicação permite que os usuários criem, editem, concluam e excluam tarefas de forma simples e intuitiva.

* Tecnologias Utilizadas:

Backend: PHP com PDO para interação com MySQL

Banco de Dados: MySQL

Frontend: HTML, CSS e JavaScript

Estilização: Bootstrap para responsividade

* Funcionalidades:

📌 Listagem de Tarefas: Exibe todas as tarefas cadastradas com opção de filtro por status (Pendente/Concluída)

✏️ Criação de Tarefa: Formulário para adicionar novas tarefas

📝 Edição de Tarefa: Permite alterar título e descrição de uma tarefa

✅ Marcar como Concluída: Opção para alterar o status da tarefa

❌ Exclusão de Tarefa: Possibilidade de remover uma tarefa (com confirmação)

* Instalação e Configuração:

1. Clonar o repositório

    git clone https://github.com/seu-usuario/nome-do-repositorio.git

2. Configurar o Banco de Dados

Crie um banco de dados no MySQL

Execute o seguinte script SQL para criar a tabela:

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

Configure o arquivo config.php com as credenciais do banco:

<?php
$host = 'localhost';
$dbname = 'seu_banco';
$user = 'seu_usuario';
$pass = 'sua_senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>

3. Rodar o Servidor PHP

    php -S localhost:8000 -t public/

Acesse em http://localhost:8000

* Estrutura do Projeto:

/todo-list

│── db/                 # Scripts do banco de dados
│   ├── init.sql        # Script para criar a tabela
│── public/             # Arquivos acessíveis pelo navegador
│   ├── index.php       # Página inicial
│   ├── script.js       # Lógica do frontend
│   ├── styles.css      # Estilos
│── src/                # Código do backend
│   ├── config.php      # Configuração do banco de dados
│   ├── TaskController.php # CRUD de tarefas

* Melhorias Futuras 🚀

Implementar autenticação de usuários;
Criar API REST para consumo externo;
Melhorar UI/UX;
Adicionar categorias para organização de tarefas;

Contato 📩

Caso tenha alguma dúvida ou sugestão, entre em contato:

GitHub: https://github.com/pedroleal2023

LinkedIn: https://www.linkedin.com/in/pedroleal-tech/
