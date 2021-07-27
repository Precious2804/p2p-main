<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllGetRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'get_help_id',
        'email',
        'amount',
        'acct_name',
        'acct_number',
        'bank',
        'phone',
        'total'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
