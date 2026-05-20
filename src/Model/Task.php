<?php

class Task
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($title, $description, $dueDate)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, due_date) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description, $dueDate]);
    }

    public function complete($id)
    {
        $stmt = $this->pdo->prepare("UPDATE tasks SET done = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
