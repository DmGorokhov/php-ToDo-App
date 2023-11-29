<?php

namespace App\Services;

use App\Services\Interfaces\ToDoListInterface;

use App\Models\{
    User,
    ToDoList,
    Task,
    };


class ToDoListService implements ToDoListInterface
{
    /**
     * Actions with todo list.
     */
        
    public function findToDoList(int $todoID)
    {
        $toDoList = ToDoList::find($todoID);
        return $toDoList;
    }

    public function getPublicToDoLists(int $paginate = 10)
    {
        $publicToDoLists = ToDoList::public()->orderBy('created_at', 'desc')->paginate();
        return $publicToDoLists;
    }
        
    public function storeToDoList(int $ownerID, array $params)
    {
        $toDoList = new ToDoList();
        $toDoList->owner = $ownerID;
        $toDoList->fill($params);
        $toDoList->save();
    }
    
    public function updateToDoList(int $todoID, array $params)
    {
        $toDoList = ToDoList::findOrFail($todoID);
        $toDoList->fill($params);
        $toDoList->save();

    }
       
    public function destroyToDoList(int $todoID)
    {
        $toDoList = ToDoList::find($todoID);
        if ($toDoList) {
            $toDoList->delete();
        }
    }

    public function getUserToDoLists(int $userID)
    {
        $toDoLists = User::find($userID)->todolists()->orderBy('created_at', 'desc')->get();
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