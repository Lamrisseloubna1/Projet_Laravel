<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['title', 'description', 'status', 'due_date', 'assigned_to', 'team_id'];
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
=======
>>>>>>> 2da54536c53673e1a94d2b593b8d2d303a9c38e8
}
