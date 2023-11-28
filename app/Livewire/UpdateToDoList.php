<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ToDoListForm;
use Illuminate\Support\Facades\Auth;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;


class UpdateToDoList extends Component
{
    
    public ToDoListForm $form;
    public $todoID;  
      
    public function mount(ToDoListInterface $toDoListService, $todoID)
    {
        $currentToDo = $toDoListService->findToDoList($todoID);
        $this->form->setToDo($currentToDo);

    }
    
    public function update(ToDoListInterface $toDoListService)
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
