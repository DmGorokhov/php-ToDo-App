<?php

namespace App\Livewire;
use App\Livewire\Forms\ToDoListForm;
use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class CreateToDoList extends Component
{
    public ToDoListForm $form;
         
    public function save(ToDoListInterface $toDoListService)
    {
        $this->validate();
        $ownerID = Auth::user()->id;
        $data = $this->form->all(); 
        $toDoListService->storeToDoList($ownerID, $data);

        $this->dispatch('todo-created');
    }
        
    public function render()
    {
        return view('livewire.todolist.create-to-do-list');
    }
}
