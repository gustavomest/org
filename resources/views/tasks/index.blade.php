<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        /* Novo estilo para o menu de navegação */
        .nav-bar {
            background-color: #007bff;
            padding: 10px;
            text-align: center; /* Centralizar os links da barra de navegação */
        }

        .nav-link {
            color: #fff;
            margin-right: 20px;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #f8f8f8;
        }

        form {
            display: inline-block;
            margin-bottom: 10px;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }

        button:hover {
            background-color: #c82333;
        }

        button[type="submit"] {
            background-color: #dc3545;
        }

        button[type="submit"]:hover {
            background-color: #c82333;
        }

        button[type="button"] {
            background-color: #007bff;
        }

        button[type="button"]:hover {
            background-color: #0056b3;
        }

        .create-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .task-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .task-container {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo para cada tarefa */
        .task {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Estilo para informações da tarefa */
        .task-info {
            flex: 1;
            text-align: left; /* Alinhar informações da tarefa à esquerda */
        }

        /* Estilo para ações da tarefa (botões) */
        .task-actions {
            display: flex;
            align-items: center;
        }

        /* Estilo para botão de editar */
        .task-actions a.edit-button {
            background-color: #28a745;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        /* Estilo para botão de deletar */
        .task-actions form.delete-form {
            display: inline-block;
            margin: 0;
        }

        .task-actions form.delete-form button.delete-button {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Barra de navegação -->
    <div class="nav-bar">
        <a href="{{ route('tasks.index') }}" class="nav-link">Listagem de Tarefas</a>
        <a href="{{ route('tasks.create') }}" class="nav-link">Criar Tarefa</a>
    </div>

    <div class="task-container">
        @php
            // Ordenar as tarefas por prioridade (1 primeiro)
            $tasks = $tasks->sortBy('priority');
        @endphp

        @foreach ($tasks as $task)
            <div class="task">
                <div class="task-info">
                    <p>{{ $task->name }} - {{ $task->description }} - Prazo: {{ $task->deadline }} - Prioridade: {{ $task->priority }}</p>
                </div>
                <div class="task-actions">
                    <a href="{{ route('tasks.edit', $task) }}" class="edit-button">Editar</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Deletar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>