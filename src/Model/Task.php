<?php
// src/Model/Task.php
namespace Model;

use PDO;
use PDOException;

class Task {
    private PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->initializeTable();
    }
    
    private function initializeTable(): void {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            description TEXT,
            due_date TEXT NOT NULL,
            responsible TEXT NOT NULL,
            done INTEGER DEFAULT 0
        )");
    }
    
    public function create(string $title, string $description, string $due_date, string $responsible): bool {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, due_date, responsible) VALUES (:title, :description, :due_date, :responsible)");
        return $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':due_date' => $due_date,
            ':responsible' => $responsible
        ]);
    }
    
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return $task ?: null;
    }
    
    public function complete(int $id): void {
        $this->pdo->exec("UPDATE tasks SET done = 1 WHERE id = $id");
    }
    
    public function delete(int $id): void {
        $this->pdo->exec("DELETE FROM tasks WHERE id = $id");
    }
    
    public function getAll(): array {
        return $this->pdo->query("SELECT * FROM tasks ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>