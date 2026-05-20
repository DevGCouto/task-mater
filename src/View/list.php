<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas - MVP</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #1a73e8; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #1a73e8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1557b0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        .done { text-decoration: line-through; color: #888; }
        .actions a { margin-right: 10px; text-decoration: none; padding: 5px 10px; border-radius: 4px; }
        .complete { background: #28a745; color: white; }
        .delete { background: #dc3545; color: white; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>📝 Gerenciador de Tarefas - MVP</h1>
            
            <?php if (isset($error) && !empty($error)): ?>
                <div class="error">❌ <?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" action="index.php?action=create">
                <div class="form-group">
                    <label>Título *</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Data de Vencimento</label>
                    <input type="date" name="due_date">
                </div>
                <button type="submit">➕ Adicionar Tarefa</button>
            </form>
        </div>

        <div class="card">
            <h2>📋 Minhas Tarefas</h2>
            <?php if (empty($tasks)): ?>
                <p>Nenhuma tarefa cadastrada. 🎉</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Título</th><th>Descrição</th><th>Vencimento</th><th>Status</th><th>Ações</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?php echo $task['id']; ?></td>
                            <td class="<?php echo $task['done'] ? 'done' : ''; ?>">
                                <?php echo htmlspecialchars($task['title']); ?>
                            </td>
                            <td><?php echo htmlspecialchars($task['description']); ?></td>
                            <td><?php echo htmlspecialchars($task['due_date']); ?></td>
                            <td><?php echo $task['done'] ? '✅ Concluída' : '⏳ Pendente'; ?></td>
                            <td class="actions">
                                <?php if (!$task['done']): ?>
                                    <a href="index.php?action=complete&id=<?php echo $task['id']; ?>" class="complete">✔ Concluir</a>
                                <?php endif; ?>
                                <a href="index.php?action=delete&id=<?php echo $task['id']; ?>" class="delete" onclick="return confirm('Tem certeza?')">🗑 Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>