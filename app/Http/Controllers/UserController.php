<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;


class UserController extends Controller
{
    
    public function show(string $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $this->authorize('show', $user);
            $userName = $user->getUserName();
            return view('user.show', ['userID'=>$user_id, 'userName'=>$userName]);
        }
        abort(404);
    }
}
