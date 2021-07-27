<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSupport extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'email',
        'ticket_type',
        'subject',
        'message',
        'attach',
        'reply'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
