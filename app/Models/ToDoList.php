<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany,
    };

use App\Models\{
    User, 
    Task,
    };


class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'progress',
        'todo_status'
    ];

    
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'todoList');
    }

}