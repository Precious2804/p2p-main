<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessGet extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'get_help_id'
    ];
}
