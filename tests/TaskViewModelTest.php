<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Model/Task.php';
require_once __DIR__ . '/../src/ViewModel/TaskViewModel.php';

class TaskViewModelTest extends TestCase
{
    public function testFormataTituloParaMaiusculo()
    {
        // Mock do Model
        $modelMock = $this->createMock(Task::class);
        $modelMock->method('getAll')->willReturn([
            ['id' => 1, 'title' => 'estudar php', 'description' => '', 'due_date' => '', 'done' => 0]
        ]);

        // Instancia o ViewModel
        $viewModel = new TaskViewModel($modelMock);
        $tasks = $viewModel->getTasks();

        // Verifica se formatou para MAIÚSCULO
        $this->assertEquals('ESTUDAR PHP', $tasks[0]['title']);
    }
}
