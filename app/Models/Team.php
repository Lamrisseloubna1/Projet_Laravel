<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
<<<<<<< branchR
    
=======
     // Define the relationship where a team has many users
     public function users()
     {
         return $this->hasMany(User::class);
     }

     public function tasks()
{
    return $this->hasMany(Task::class);
}
    public function members()
    {
        return $this->hasMany(User::class);
    }
>>>>>>> local
}
