<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function show(User $user, User $viewedUser): Response 
    {
        return ($viewedUser->isPublic() || $user->id === $viewedUser->id)
                    ? Response::allow()
                    : Response::deny('This is private account. Only owner can view it.');
    }
}
