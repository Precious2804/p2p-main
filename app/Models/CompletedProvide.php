<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedProvide extends Model
{
    use HasFactory;
    protected $fillable = [
        'tab_id',
        'id',
        'get_help_id',
        'email',
        'amount',
        'rate',
        'profit',
        'total',
        'due_time'
    ];


    public $incrementing = false;
    protected $keyType = 'string';
}
