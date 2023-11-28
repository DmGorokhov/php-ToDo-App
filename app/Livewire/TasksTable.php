<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


class TasksTable extends Component
{
    public $tasksByToDoList = []; 
    public $todoID;  

    public function mount($todoID)
    {
        $this->todoID = $todoID;
    }   
    
    #[On('task-deleted')]
    public function boot(ToDoListService $toDoListService)
    {
        
        $this->tasksByToDoList = $toDoListService->getTasksByToDo($this->todoID);

    }
     
    public function delete(ToDoListService $toDoListService, $task_id)
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
