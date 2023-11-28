<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ToDoList;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'progress',
        'todoList',
    ];

    
    public function todoList(): BelongsTo
    {
        return $this->belongsTo(ToDoList::class, 'owner');
    }
}
