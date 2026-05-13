<?php
// src/Controller/TaskController.php
namespace Controller;

use Model\Task;
use PDO;

class TaskController {
    private Task $taskModel;
    private string $error = '';
    
    public function __construct(PDO $pdo) {
        $this->taskModel = new Task($pdo);
    }
    
    public function handleRequest(): void {
        $this->processActions();
        
        if ($this->isCreateRequest()) {
            $this->processCreateTask();
        }
        
        $tasks = $this->taskModel->getAll();
        $this->renderView($tasks);
    }
    
    private function isCreateRequest(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']);
    }
    
    private function processCreateTask(): void {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $due_date = $_POST['due_date'];
        $responsible = trim($_POST['responsible']);
        
        if (empty($title) || empty($due_date) || empty($responsible)) {
            $this->error = "Título, Data de Vencimento e Responsável são obrigatórios!";
            return;
        }
        
        if ($this->taskModel->create($title, $description, $due_date, $responsible)) {
            $this->redirectToIndex();
        }
    }
    
    private function processActions(): void {
        if (!isset($_GET['action'], $_GET['id'])) {
            return;
        }
        
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        
        if ($action === 'complete') {
            $this->taskModel->complete($id);
        } elseif ($action === 'delete') {
            $this->taskModel->delete($id);
        }
        
        $this->redirectToIndex();
    }
    
    private function renderView(array $tasks): void {
        require __DIR__ . '/../View/tasks.php';
    }
    
    private function redirectToIndex(): void {
        header("Location: index.php");
        exit;
    }
}
?>