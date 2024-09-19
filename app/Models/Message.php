<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receiver_id', 'message', 'read_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function markAsRead()
    {
        $this->read_at = Carbon::now();
        $this->save();
    }

    public function isRead()
    {
        return !is_null($this->read_at);
    }
}
