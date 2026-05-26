<<<<<<< HEAD
cat > src/Presenter/TaskPresenter.php << 'EOF'
=======
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
<?php
class TaskPresenter {
    private $model;
    private $view;

<<<<<<< HEAD
=======
    // INJEÇÃO DE DEPENDÊNCIA: O Presenter exige o Model e a INTERFACE da View
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
    public function __construct(Task $model, TaskViewInterface $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index() {
        try {
            $tasks = $this->model->getAll();
<<<<<<< HEAD
            
            foreach ($tasks as &$task) {
                $task['title'] = strtoupper($task['title']);
            }
            
            $this->view->displayTasks($tasks);
        } catch (Exception $e) {
=======
           
            // Lógica de Formatação da Apresentação (Apenas no MVP)
            foreach ($tasks as &$task) {
                $task['title'] = strtoupper($task['title']);
            }
           
            // O Presenter manda a View exibir as tarefas [cite: 215]
            $this->view->displayTasks($tasks);
        } catch (Exception $e) {
            // Em caso de erro, manda a View exibir o erro
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
            $this->view->showError($e->getMessage());
        }
    }

    public function create($title, $description, $dueDate) {
        try {
            $this->model->save($title, $description, $dueDate);
            header("Location: index.php");
        } catch (Exception $e) {
            $this->view->showError($e->getMessage());
        }
    }

    public function complete($id) {
        $this->model->complete($id);
        header("Location: index.php");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php");
    }
<<<<<<< HEAD
}
=======
}
?>
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
