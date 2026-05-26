<<<<<<< HEAD
cat > tests/TaskPresenterTest.php << 'EOF'
<?php
use PHPUnit\Framework\TestCase;

// Incluir os arquivos diretamente
=======
<?php
use PHPUnit\Framework\TestCase;
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
require_once __DIR__ . '/../src/Model/Task.php';
require_once __DIR__ . '/../src/View/TaskViewInterface.php';
require_once __DIR__ . '/../src/Presenter/TaskPresenter.php';

class TaskPresenterTest extends TestCase {
    public function testIndexFormataTitulosParaMaiusculo() {
<<<<<<< HEAD
        // Criar mock do Model
        $modelMock = $this->getMockBuilder(Task::class)
                          ->disableOriginalConstructor()
                          ->onlyMethods(['getAll'])
                          ->getMock();
        
        $modelMock->expects($this->once())
                  ->method('getAll')
                  ->willReturn([
                      ['id' => 1, 'title' => 'estudar php', 'description' => '', 'due_date' => '', 'done' => 0]
                  ]);

        // Mock da View
        $viewMock = $this->createMock(TaskViewInterface::class);
        
        $viewMock->expects($this->once())
                 ->method('displayTasks')
                 ->with($this->callback(function($tasks) {
                     return $tasks[0]['title'] === 'ESTUDAR PHP';
                 }));

=======
        // 1. Mock do Model (Fingimos que o banco retornou uma tarefa minúscula)
        $modelMock = $this->createMock(Task::class);
        $modelMock->method('getAll')->willReturn([
            ['id' => 1, 'title' => 'estudar php', 'description' => '', 'due_date' => '', 'done' => 0]
        ]);

        // 2. Mock da View Interface [cite: 216]
        $viewMock = $this->createMock(TaskViewInterface::class);

        // 3. A EXPECTATIVA: Garantimos que o Presenter chamou 'displayTasks'
        // passando o título formatado em MAIÚSCULO.
        $viewMock->expects($this->once())
                ->method('displayTasks')
                ->with($this->callback(function($tasks) {
                    return $tasks[0]['title'] === 'ESTUDAR PHP';
                }));

        // 4. Executamos o teste injetando os Mocks
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
        $presenter = new TaskPresenter($modelMock, $viewMock);
        $presenter->index();
    }
}
<<<<<<< HEAD
=======
?>.\vendor\bin\phpunit tests\TaskPresenterTest.php
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
