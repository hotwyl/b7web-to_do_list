<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'cod',
        'user_id',
        'task',
        'done',
        'deleted'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'deleted'
    ];
}
