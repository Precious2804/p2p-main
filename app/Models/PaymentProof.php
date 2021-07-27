<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    use HasFactory;
    protected $fillable = [
        'proof_id',
        'id',
        'get_help_id',
        'email',
        'pay_method',
        'dep_name',
        'paid_date',
        'amount',
        'proof',
        'rate',
        'profit',
        'total'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
