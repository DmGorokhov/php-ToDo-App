<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;


class ToDoListForm extends Form
{   
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

    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('to_do_lists')->where(function ($query) {
                return $query->where('todo_status', $this->todo_status);
                }),
            ],
        ];
    }
}
