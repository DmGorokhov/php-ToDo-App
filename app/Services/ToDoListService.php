<?php

namespace App\Services;


use App\Models\{
    User,
    ToDoList,
    Task,
    };


class ToDoListService
{
    
    /**
     * Actions with todo lists.
     */
    
    
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


    /**
     * Actions with todo list tasks.
     */
    
    
    public function storeTask(int $todoID, string $taskName)
    {
        $task = new Task();
        $task->fill(['name'=>$taskName, 'todoList'=>$todoID]);
        $task->save();
    }

    public function getTasksByToDo(int $todoID)
    {
        
        $tasks = ToDoList::find($todoID)->tasks()->orderBy('created_at')->get();
        return $tasks;
    }

    public function destroyTask(int $task_id)
    {
        $task = Task::find($task_id);
        if ($task) {
            $task->delete();
        }
    }

}