<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

//    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'from_user',
        'to_user',
        'user_id',
        'chat_id',
        'content'

        // Add other attr
    ];
    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i:s a m/d/Y');
    }
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
