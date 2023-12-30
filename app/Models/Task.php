<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Team;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date', 'assigned_to', 'team_id','created_at','updated_at'];
    protected $table = 'tasks';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Define the relationship where a task is assigned to a user
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    
    }
 


// class Task extends Model
// {
//     use HasFactory;
//     protected $fillable = ['title', 'description', 'status', 'due_date', 'assigned_to', 'team_id'];
//     protected $table = 'tasks';
//     public function assignedUser()
//     {
//         return $this->belongsTo(User::class, 'assigned_to');
//     }

//     public function team()
//     {
//         return $this->belongsTo(Team::class);
//     }
// }
