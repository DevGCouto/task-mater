<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Task Master - MVC Edition</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
        .container { max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: auto; }
        .form-group { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
        input, textarea, button { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #2563eb; color: white; cursor: pointer; border: none; }
        button:hover { background: #1d4ed8; }
        .error { color: red; margin-bottom: 10px; padding: 10px; background: #fee; border-radius: 4px; }
        ul { list-style: none; padding: 0; }
        li { padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: flex-start; }
        .task-info { flex: 1; }
        .task-meta { font-size: 0.85em; color: #666; margin-top: 5px; }
        li.done strong { text-decoration: line-through; color: #9ca3af; }
        .actions { display: flex; gap: 10px; margin-left: 10px; }
        .actions a { text-decoration: none; font-size: 1.2em; }
        .empty-state { text-align: center; color: #666; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Task Master (MVC Edition)</h1>
    
    <?php if (!empty($this->error)): ?>
        <div class="error"><?php echo htmlspecialchars($this->error); ?></div>
    <?php endif; ?>
    
    <form method="POST" class="form-group">
        <input type="text" name="title" placeholder="Título da tarefa *" required>
        <textarea name="description" placeholder="Descrição (opcional)" rows="3"></textarea>
        <input type="date" name="due_date" required>
        <input type="text" name="responsible" placeholder="Responsável *" required>
        <button type="submit">Adicionar Tarefa</button>
    </form>
    
    <ul>
        <?php if (empty($tasks)): ?>
            <li class="empty-state">✨ Nenhuma tarefa cadastrada. Adicione a primeira!</li>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <li class="<?php echo $task['done'] ? 'done' : ''; ?>">
                    <div class="task-info">
                        <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                        <?php if (!empty($task['description'])): ?>
                            <span style="font-size: 0.9em;"><?php echo htmlspecialchars($task['description']); ?></span>
                        <?php endif; ?>
                        <div class="task-meta">
                            📅 Vence em: <?php echo date('d/m/Y', strtotime($task['due_date'])); ?> | 
                            👤 Responsável: <?php echo htmlspecialchars($task['responsible']); ?>
                        </div>
                    </div>
                    
                    <div class="actions">
                        <?php if (!$task['done']): ?>
                            <a href="?action=complete&id=<?php echo $task['id']; ?>" title="Concluir">✅</a>
                        <?php endif; ?>
                        <a href="?action=delete&id=<?php echo $task['id']; ?>" title="Excluir" 
                           onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">❌</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>