<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;


class TasksTable extends Component
{
    public $tasksByToDoList = []; 
    public $todoID;  

    public function mount($todoID)
    {
        $this->todoID = $todoID;
    }   
    
    #[On('task-deleted')]
    public function boot(ToDoListInterface $toDoListService)
    {
        
        $this->tasksByToDoList = $toDoListService->getTasksByToDo($this->todoID);

    }
     
    public function delete(ToDoListInterface $toDoListService, $task_id)
    {
        $toDoListService->destroyTask($task_id);
        $this->dispatch('task-deleted');

    }

    #[On('task-created')]
    public function render()
    {
        return view('livewire.tasks-table', ['tasks' => $this->tasksByToDoList]);
    }
}
