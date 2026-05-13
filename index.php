<?php
// index.php - Ponto de entrada da aplicação
require_once __DIR__ . '/src/Model/Task.php';
require_once __DIR__ . '/src/Controller/TaskController.php';

// Configuração do banco de dados
$dbFile = __DIR__ . '/tasks.sqlite';
$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Inicializar e executar o Controller
$controller = new Controller\TaskController($pdo);
$controller->handleRequest();
?>