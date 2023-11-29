<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ToDoListController,
    UserController,
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('user/{user_id}', 'UserController@show')
    ->middleware(['auth'])
    ->name('user.show');


Route::get('todo/{todo_id}/update', 'ToDoListController@update')
    ->middleware(['auth'])
    ->name('todolist.update');

Route::get('todo/{todo_id}', 'ToDoListController@show')->name('todolist.show');



require __DIR__.'/auth.php';
