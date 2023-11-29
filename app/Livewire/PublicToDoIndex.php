<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;

class PublicToDoIndex extends Component
{
    use WithPagination;
       
    public function render(ToDoListInterface $ToDoListService)
    {
        $publicToDoIndex = $ToDoListService->getPublicToDoLists();
        return view('livewire.public-to-do-index', ['publicToDoIndex'=>$publicToDoIndex]);
    }
}
