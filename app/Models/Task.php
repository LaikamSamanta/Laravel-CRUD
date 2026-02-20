<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    // protected $guarded = []; // Allow mass assignment for all fields (not recommended for production)
    protected $table = 'tasks'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['title', 'description', 'completed', 'user_id']; // Specify the fillable fields for mass assignment

    public function user()
    // to find wich user a task beloongs to
    // write $task = App\Models\Task::find(1); $task->user; in tinker to see the user of the task with id 1
    {

        return $this->belongsTo(User::class); // Define the relationship to the User model
    }

}