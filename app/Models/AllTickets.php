<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'id',
        'email',
        'ticket_type'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
