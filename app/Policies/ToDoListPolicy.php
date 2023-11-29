<?php

namespace App\Policies;

use App\Models\ToDoList;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ToDoListPolicy
{
    /**
     * Determine whether the user can view todo list.
     */
    public function view(User $user, ToDoList $toDoList)
    {
        // If the todo_status is public, allow everyone to view it
        if ($toDoList->todo_status == 'public') {
            return true;
        }

        // If the todo_status is private, only allow the owner to view it
        if ($toDoList->todo_status == 'private' && $user->id == $toDoList->owner) {
            return true;
        }

        // If the todo_status is private and the user is not the owner, deny the action
        return false;
    }
}
