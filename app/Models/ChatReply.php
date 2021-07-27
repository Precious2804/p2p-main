<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_id',
        'email',
        'ticket_type',
        'reply'
    ];
}
