<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTotalHelp extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'totalAmount',
        'totalProfit',
        'sumTotal',
        'noOfInvestments'
    ];
}
