<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;

use Illuminate\Http\Request;
use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;

class ToDoListController extends Controller
{
    
    public function show(ToDoListInterface $ToDoListService, string $todoID)
    {
        $todoList = $ToDoListService->findToDoList($todoID);
        return view('todolist.show', ['todoID'=>$todoID, 
                                      'todoName'=> $todoList->name,
                                      'todoDescription'=> $todoList->description]
                    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('todolist.update', ['todoID' => $id]);
    }
}
