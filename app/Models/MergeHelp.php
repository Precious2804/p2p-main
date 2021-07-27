<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MergeHelp extends Model
{
    use HasFactory;
    protected $fillable = [
        'merge_id',
        'id',
        'get_help_id',
        'amount',
        'acct_name',
        'acct_number',
        'bank',
        'phone'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
