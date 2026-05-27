<?php

class TaskViewModel
{
    private $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function getTasks()
    {
        $tasks = $this->model->getAll();
        
        foreach ($tasks as &$task) {
            $task['title'] = strtoupper($task['title']);
        }
        
        return $tasks;
    }
}
