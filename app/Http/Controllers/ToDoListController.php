<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Services\Interfaces\ToDoListInterface;
use App\Services\ToDoListService;

class ToDoListController extends Controller
{
    
    public function show(ToDoListInterface $ToDoListService, string $todoID)
    {
        $todoList = $ToDoListService->findToDoList($todoID);
        
        // Check if the user is authorized to view the ToDoList item
        if (!Gate::allows('view', $todoList)) {
            abort(403, 'This is private page and only owner can get it');
        }   
        
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
