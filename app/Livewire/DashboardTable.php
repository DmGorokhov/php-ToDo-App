<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


class DashboardTable extends Component
{
    public $toDoLists = []; 
    public $authUserID;
    
    
   
    
    #[On('todo-deleted')]
    public function boot(ToDoListService $toDoListService)
    {
        if ($this->authUserID === null) { 
            $this->authUserID = Auth::user()->id;
            }
        
        $this->toDoLists = $toDoListService->getUserToDoLists($this->authUserID);

    }
     
    public function delete(ToDoListService $toDoListService, $todo_id)
    {
        $toDoListService->destroyToDoList($todo_id);
        $this->dispatch('todo-deleted');

    }

    #[On('todo-created')]
    public function render()
    {  
        return view('livewire.todolist.dashboard-table', ['toDoLists' => $this->toDoLists]);
    }

}
