<?php

namespace App\Services\Interfaces;



Interface ToDoListInterface
{
    /**
     * Actions with todo list.
     */
    
    public function findToDoList(int $todoID);
    public function storeToDoList(int $ownerID, array $params);
    public function updateToDoList(int $todoID, array $params);
    public function destroyToDoList(int $todoID);
    public function getUserToDoLists(int $userID);
    public function getPublicToDoLists();
   
    /**
     * Actions with todo list tasks.
     */
    
    public function storeTask(int $todoID, string $taskName);
    public function getTasksByToDo(int $todoID);
    public function destroyTask(int $taskID);
}