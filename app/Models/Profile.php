<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'about',
        'cnic',
        'country',
        'address',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
