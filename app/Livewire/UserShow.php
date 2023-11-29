<?php

namespace App\Livewire;

use Livewire\Component;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;

use App\Models\User;

class UserShow extends Component
{
    
    public $todoByUser = []; 

    public $userID;

    public function mount($userID)
    {
        $this->userID = $userID;
    }   
    

    public function boot(ToDoListInterface $ToDoListService)
    {
        $this->todoByUser = $ToDoListService->getUserToDoLists($this->userID);
    }   
    
    
    public function render()
    {
        return view('livewire.user-show', ['todoIndex'=>$this->todoByUser]);
    }
}
