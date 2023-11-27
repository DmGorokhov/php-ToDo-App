<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ToDoListForm extends Form
{
   
   #[Validate('required|max:255')]
   public $name = ''; 

   #[Validate('string')]
   public $description = '';

   #[Validate('required|in:active,completed')]
   public $progress = 'active';

   #[Validate('required|in:private,public')]
   public $todo_status = '';

   public function setToDo($params)
    {
        $this->name = $params['name'];
        $this->description = $params['description'];
        $this->progress = $params['progress'];
        $this->todo_status = $params['todo_status'];
    }

}
