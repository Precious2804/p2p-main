<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvideHelp extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'email',
        'rate',
        'profit',
        'total'
    ];
}
