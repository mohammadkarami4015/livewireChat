<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function isDeliver()
    {
        return $this->is_deliver;
    }

    public function scopeMessageList($query, $selectedUser)
    {
        return $query->where(function (Builder $query) use ($selectedUser) {
            $query->where('sender_id', auth()->id())
                ->orWhere('receiver_id', auth()->id());
        })->where(function (Builder $query) use ($selectedUser) {
            $query->where('sender_id', $selectedUser->id ?? null)
                ->orWhere('receiver_id', $selectedUser->id ?? null);
        });
    }

    public function scopeSearch($query, $text)
    {

     return   $query->where('text', 'like', '%' . $text . '%')
           ;
    }
}
