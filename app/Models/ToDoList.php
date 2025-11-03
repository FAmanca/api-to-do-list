<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'description',
        'priorty',
        'due_date',
        'is_completed',
    ];
}
