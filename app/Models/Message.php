<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Message extends Model implements ShouldBroadcast
{
    use HasFactory;

    protected $fillable = ['user_id', 'team_id', 'content'];

    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
