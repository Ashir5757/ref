<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageContent extends Model
{
    use HasFactory;
    protected $table = 'about_page_content';
    protected $fillable = [
        'h1', 'h2', 'image1', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10',
        'h11', 'h12', 'image2', 'h13', 'h14', 'h15', 'h16', 'h17', 'h18',
        'h19', 'h20', 'h21', 'h22', 'image3', 'h23', 'video', 'h24', 'h25', 'h26',
        'h27', 'h28', 'h29', 'h30', 'h31',
    ];
}
