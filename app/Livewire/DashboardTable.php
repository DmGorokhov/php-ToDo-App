<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;


class DashboardTable extends Component
{
    public $toDoLists = []; 
    public $authUserID;
        
    #[On('todo-deleted')]
    public function boot(ToDoListInterface $ToDoListService)
    {
        if ($this->authUserID === null) { 
            $this->authUserID = Auth::user()->id;
            }
        
        $this->toDoLists = $ToDoListService->getUserToDoLists($this->authUserID);

    }
     
    public function delete(ToDoListInterface $ToDoListService, $todo_id)
    {
        $ToDoListService->destroyToDoList($todo_id);
        $this->dispatch('todo-deleted');

    }

    #[On('todo-created')]
    public function render()
    {  
        return view('livewire.todolist.dashboard-table', ['toDoLists' => $this->toDoLists]);
    }

}
