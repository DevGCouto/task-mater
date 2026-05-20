cat > tests/TaskPresenterTest.php << 'EOF'
<?php
use PHPUnit\Framework\TestCase;

// Incluir os arquivos diretamente
require_once __DIR__ . '/../src/Model/Task.php';
require_once __DIR__ . '/../src/View/TaskViewInterface.php';
require_once __DIR__ . '/../src/Presenter/TaskPresenter.php';

class TaskPresenterTest extends TestCase {
    public function testIndexFormataTitulosParaMaiusculo() {
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

        $presenter = new TaskPresenter($modelMock, $viewMock);
        $presenter->index();
    }
}
