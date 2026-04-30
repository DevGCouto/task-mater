<?php
// ==========================================
// AULA 01: O CÓDIGO SPAGHETTI (Evoluído)
// ==========================================

// 1. CONEXÃO E ATUALIZAÇÃO DO BANCO (Inclusão dos novos campos)
$dbFile = __DIR__ . '/tasks.sqlite';
$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Criar tabela com os novos campos
$pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    due_date TEXT NOT NULL,
    responsible TEXT NOT NULL,
    done INTEGER DEFAULT 0
)");

$error = '';

// 2. LÓGICA DE CRIAÇÃO (Capturando novos dados)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $due_date = $_POST['due_date'];
    $responsible = trim($_POST['responsible']);
    
    // Validação: Título, Data e Responsável são obrigatórios
    if (empty($title) || empty($due_date) || empty($responsible)) {
        $error = "Título, Data de Vencimento e Responsável são obrigatórios!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, description, due_date, responsible) VALUES (:title, :description, :due_date, :responsible)");
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':due_date', $due_date);
        $stmt->bindValue(':responsible', $responsible);
        $stmt->execute();
        
        header("Location: index.php");
        exit;
    }
}

// Lógica de Concluir/Deletar (Mantida do original)
if (isset($_GET['action'])) {
    $id = (int)$_GET['id'];
    if ($_GET['action'] === 'complete') {
        $pdo->exec("UPDATE tasks SET done = 1 WHERE id = $id");
    } elseif ($_GET['action'] === 'delete') {
        $pdo->exec("DELETE FROM tasks WHERE id = $id");
    }
    header("Location: index.php");
    exit;
}

$tasks = $pdo->query("SELECT * FROM tasks ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Task Master - Spaghetti Evolution</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
        .container { max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: auto; }
        .form-group { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
        input, textarea, button { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #2563eb; color: white; cursor: pointer; border: none; }
        .error { color: red; margin-bottom: 10px; }
        ul { list-style: none; padding: 0; }
        li { padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: flex-start; }
        .task-info { display: flex; flex-direction: column; }
        .task-meta { font-size: 0.85em; color: #666; margin-top: 5px; }
        li.done span { text-decoration: line-through; color: #9ca3af; }
    </style>
</head>
<body>

<div class="container">
    <h1>Task Master (Spaghetti Edition)</h1>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php" class="form-group">
        <input type="text" name="title" placeholder="Título da tarefa *" required>
        <textarea name="description" placeholder="Descrição (opcional)"></textarea>
        <input type="date" name="due_date" required title="Data de Vencimento *">
        <input type="text" name="responsible" placeholder="Responsável *" required>
        <button type="submit">Adicionar Tarefa</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li class="<?php echo $task['done'] ? 'done' : ''; ?>">
                <div class="task-info">
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                    <span style="font-size: 0.9em;"><?php echo htmlspecialchars($task['description']); ?></span>
                    <div class="task-meta">
                        Vence em: <?php echo date('d/m/Y', strtotime($task['due_date'])); ?> | 
                        Responsável: <?php echo htmlspecialchars($task['responsible']); ?>
                    </div>
                </div>
                
                <div class="actions">
                    <?php if (!$task['done']): ?>
                        <a href="?action=complete&id=<?php echo $task['id']; ?>" title="Concluir">✅</a>
                    <?php endif; ?>
                    <a href="?action=delete&id=<?php echo $task['id']; ?>" title="Excluir">❌</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>