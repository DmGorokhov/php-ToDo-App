<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ToDoListForm;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


class UpdateToDoList extends Component
{
    
    public ToDoListForm $form;
    public $todoID;  
      
    public function mount(ToDoListService $toDoListService, $todoID)
    {
        $currentToDo = $toDoListService->findToDoList($todoID);
        $this->form->setToDo($currentToDo);

    }

    
    
    public function update(ToDoListService $toDoListService)
    {
        $this->validate();
        $owner = Auth::user()->id;
        $data = $this->form->all(); 
        $toDoListService->updateToDoList($this->todoID, $data);
    }
    
    


    public function render()
    {
        return view('livewire.todolist.update-to-do-list');
    }
}
