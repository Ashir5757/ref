<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    protected $table = "contact_page";
    protected $fillable = [
        'h1', 'h2', 'h3', 'h4', 'image1',

    ];
}