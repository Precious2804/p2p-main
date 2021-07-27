<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProvidedHelp extends Model
{
    use HasFactory;

    protected $fillable = [
        'prov_id',
        'id',
        'description',
        'email',
        'amount',
        'rate',
        'profit',
        'total',
        'due_time',
        'status',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
