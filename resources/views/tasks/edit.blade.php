<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Tarefa</title>
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

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        input[type="datetime-local"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Atualizar Tarefa</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{ $task->name }}" required>

        <label for="description">Descrição:</label>
        <textarea name="description" required>{{ $task->description }}</textarea>

        <label for="deadline">Prazo:</label>
        <input type="datetime-local" name="deadline" value="{{ date('Y-m-d\TH:i', strtotime($task->deadline)) }}" required>

        <label for="priority">Prioridade:</label>
        <input type="number" name="priority" value="{{ $task->priority }}" required>

        <button type="submit">Atualizar Tarefa</button>
    </form>
</body>
</html>