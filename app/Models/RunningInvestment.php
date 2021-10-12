<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningInvestment extends Model
{
    use HasFactory;
    protected $fillable = [
        'tab_id',
        'id',
        'email',
        'amount',
        'rate',
        'profit',
        'total',
        'due_date'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
