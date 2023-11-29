<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;

class TaskIndexByToDo extends Component
{
    
    public $tasksByToDoList = []; 
    public $todoID;  

    public function mount($todoID)
    {
        $this->todoID = $todoID;
    }   
    
    public function boot(ToDoListInterface $toDoListService)
    {
        
        $this->tasksByToDoList = $toDoListService->getTasksByToDo($this->todoID);

    }
         
    public function render()
    {
        return view('livewire.task-index-by-to-do', ['tasks' => $this->tasksByToDoList]);
    }
}
