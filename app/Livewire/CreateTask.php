<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;


class CreateTask extends Component
{
    public $todoID;  


    #[Validate('required|max:255')]
    public $name = '';

      
    public function mount($todoID)
    {
        $this->todoID = $todoID;
    }

    public function saveTask(ToDoListService $ToDoListService)
    {
        
        $ToDoListService->storeTask($this->todoID, $this->name);

        $this->dispatch('task-created');
    }
    
    
    
    public function render()
    {
        return view('livewire.create-task');
    }
}
