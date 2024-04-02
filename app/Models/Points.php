<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory;
    protected $table = 'points';
    protected $fillable = [
        'user_id',
        'investment_bonus',
        'referral_points',
        'total_points',
        'user_id',

    ];
}
