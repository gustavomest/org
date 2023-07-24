<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #007bff;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            color: #666;
        }

        input[type="text"],
        textarea,
        input[type="datetime-local"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .create-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        /* Additional styles for links */
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #0056b3;
        }

        /* Styling for form error messages */
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Criar Tarefa</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome" required>
        
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" placeholder="Descrição" required></textarea>
        
        <label for="deadline">Prazo:</label>
        <input type="datetime-local" name="deadline" id="deadline" required>
        
        <label for="priority">Prioridade (1 a 3):</label>
        <input type="number" name="priority" id="priority" min="1" max="3" placeholder="Prioridade" required>

        <button type="submit">Criar Tarefa</button>
        <a href="{{ route('tasks.index') }}"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>