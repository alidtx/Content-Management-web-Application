<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;
    protected $fillable = [
        'inst_name','institution_type','inst_description','url','location','image', 'is_featured'
    ];
}
