<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class CreateTask extends Component
{
    public $todoID;  
    public $name = '';

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('tasks')->where(function ($query) {
                    return $query->where('todoList', $this->todoID);
                })
            ],
        ];
    }

    public function mount($todoID)
    {
        $this->todoID = $todoID;
    }

    public function saveTask(ToDoListInterface $ToDoListService)
    {
        $this->validate();
        $ToDoListService->storeTask($this->todoID, $this->name);

        $this->dispatch('task-created');
    }
    
    public function render()
    {
        return view('livewire.create-task');
    }
}
