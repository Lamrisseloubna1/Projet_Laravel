<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
     // Define the relationship where a team has many users
     public function users()
     {
         return $this->hasMany(User::class);
     }

      // Define the relationship where a team has many tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function members()
    {
        return $this->hasMany(User::class);
    }
}
