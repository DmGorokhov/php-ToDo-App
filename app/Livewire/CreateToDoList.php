<?php

namespace App\Livewire;
use App\Livewire\Forms\ToDoListForm;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class CreateToDoList extends Component
{
    
    public ToDoListForm $form;
   
      
    public function save(ToDoListService $toDoListService)
    {
        $this->validate();
        $owner = Auth::user();
        $data = $this->form->all(); 
        $toDoListService->storeToDoList($owner, $data);

        $this->dispatch('todo-created');
    }
    
    
    
    public function render()
    {
        return view('livewire.todolist.create-to-do-list');
    }
}
