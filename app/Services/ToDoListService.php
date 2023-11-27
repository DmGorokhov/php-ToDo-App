<?php

namespace App\Services;


use App\Models\{
    User,
    ToDoList,
    };


class ToDoListService
{
    
    public function findToDoList(int $id)
    {
        $toDoList = ToDoList::find($id);
        return $toDoList;
    }
    
    
    
    public function storeToDoList(User $owner, array $params)
    {
        $toDoList = new ToDoList();
        $toDoList->owner = $owner->id;
        $toDoList->fill($params);
        $toDoList->save();
    }

    
    public function updateToDoList(int $todo_id, array $params)
    {
        $toDoList = ToDoList::findOrFail($todo_id);
        $toDoList->fill($params);
        $toDoList->save();

    }
   
    
    public function destroyToDoList(int $todo_id)
    {
        $toDoList = ToDoList::find($todo_id);
        if ($toDoList) {
            $toDoList->delete();
        }
    }

    public function getUserToDoLists(int $user_id)
    {
        $toDoLists = User::find($user_id)->todolists()->orderBy('created_at', 'desc')->get();
        return $toDoLists;
    }

}